<?php

namespace App\Http\Controllers\photos;

use App\Helpers\Messages;
use App\Http\Controllers\Controller;
use App\Models\Photos;
use App\Models\Problem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class photosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($problem_id)
    {
        $header = Problem::find($problem_id);
        $data = Photos::with('problem')->get();

        return $this->returnSearch(session('action') ? session('action') : 'find', session('type') ? session('type') : 'success', $header, $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($problem_id)
    {
        return view('photos.newPhotos')->with('problem_id', $problem_id);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
                'images.*' => 'required|image|mimes:png,jpg,jpeg|max:4048'
            ]);

            if ($request->hasFile('images')) {
                $good = 0;
                $bad = 0;
                foreach ($request->file('images') as $image) {
                    // Generar un nombre unico
                    $filename = uniqid() . '.' . $image->getClientOriginalExtension();

                    // Guardar la imagen en el directorio 'public/photos'
                    $path = $image->storeAs('photos', $filename, 'public');

                    // Registrar en la base de datos
                    $data = new Photos();
                    $data->problem_id = $request->problem_id;
                    $data->filename = $filename;
                    $data->path = $path;
                    if ($data->save()) {
                        $good += 1;
                    } else {
                        $bad += 1;
                    }
                }
            } else {
                return redirect()->route('photos.list', $request->problem_id)->with('action', 'add')->with('type', 'not-image-format');
            }

            if ($good > 0) {
                return redirect()->route('photos.list', $request->problem_id)->with('action', 'add')->with('type', 'success');
            }
            if ($bad > 0) {
                return redirect()->route('photos.list', $request->problem_id)->with('action', 'add')->with('type', 'danger');
            }
        } catch (\Throwable $th) {
            return redirect()->route('photos.list', $request->problem_id)->with('action', 'add')->with('type', 'general-error');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id, $problem_id)
    {
        try {
            $data = Photos::find($id);
            if ($data) {
                $filename = $data->filename;
                $path = 'photos/'.$filename;

                if (Storage::disk('public')->exists($path)) {
                    Storage::disk('public')->delete($path);
                    if ($data->delete()) {
                        return redirect()->route('photos.list', $problem_id)->with('action', 'delete')->with('type', 'success');
                    } else {
                        return redirect()->route('photos.list', $problem_id)->with('action', 'delete')->with('type', 'danger');
                    }
                }
            } else {
                return redirect()->route('photos.list', $problem_id)->with('action', 'delete')->with('type', 'exists');
            }
        } catch (\Throwable $th) {
            return redirect()->route('photos.list', $problem_id)->with('action', 'delete')->with('type', 'general-error');
        }
    }

    public function returnSearch($action, $type, $header, $data)
    {
        $m = Messages::mesagesAction($action, $type);

        return view('photos.listPhotos')
            ->with('titulo', $m[0])
            ->with('message', $m[1])
            ->with('tipo', $m[2])
            ->with('header', $header)
            ->with('data', $data);
    }
}
