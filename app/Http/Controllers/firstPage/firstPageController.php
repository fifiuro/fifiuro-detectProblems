<?php

namespace App\Http\Controllers\firstPage;

use App\Http\Controllers\Controller;
use App\Models\Photos;
use App\Models\Problem;
use Carbon\Carbon;
use Illuminate\Http\Request;

class firstPageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Problem::paginate(10);
        foreach ($data as $key => $value) {
            $photos = Photos::where('problem_id', '=', $value->id)->where('choose', '=', true)->first();
            $value->path = isset($photos) ? $photos->path : '';
        }
        return view('firstPage')->with('data', $data);
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        $data = Problem::when($request->filled('problem'), function ($query) use ($request) {
            $query->where('problem', 'like', '%' . $request->problem . '%');
        })
            ->when($request->filled('zone'), function ($query) use ($request) {
                $query->where('zone', 'like', '%' . $request->zone . '%');
            })
            ->when($request->filled('finicio'), function ($query) use ($request) {
                $query->where('date', '>=', Carbon::parse($request->input('finicio'))->startOfDay());
            })
            ->when($request->filled('ffin'), function ($query) use ($request) {
                $query->where('date', '<=', Carbon::parse($request->input('ffin'))->endOfDay());
            })
            ->paginate(10);

        foreach ($data as $key => $value) {
            $photos = Photos::where('problem_id', '=', $value->id)->where('choose', '=', true)->first();
            $value->path = isset($photos) ? $photos->path : '';
        }

        return view('firstPage')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
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
    public function destroy(string $id)
    {
        //
    }
}
