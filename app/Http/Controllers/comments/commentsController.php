<?php

namespace App\Http\Controllers\comments;

use App\Helpers\Messages;
use App\Http\Controllers\Controller;
use App\Models\comments;
use App\Models\Problem;
use Illuminate\Http\Request;

class commentsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($problem_id)
    {
        $header = Problem::find($problem_id);
        $data = comments::with('problem')->with('user')->where('problem_id', '=', $problem_id)->get();
        $oficial = false;

        foreach ($data as $key => $d) {
            if ($d->type == 'O') {
                $oficial = true;
            }
        }
        $data->oficial = $oficial;
        return $this->returnSearch(session('action') ? session('action') : 'find', session('type') ? session('type') : 'success', $header, $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($problem_id)
    {
        return view('comments.newComment')->with('problem_id', $problem_id);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $data = new comments();
            $data->problem_id = $request->problem_id;
            $data->user_id = $request->user_id;
            $data->comment = $request->comment;
            $data->type = $request->type;
            if ($data->save()) {
                return redirect()->route('comments.list', $request->problem_id)->with('action', 'add')->with('type', 'success');
            } else {
                return redirect()->route('comments.list', $request->problem_id)->with('action', 'add')->with('type', 'danger');
            }
        } catch (\Throwable $th) {
            return redirect()->route('comments.list', $request->problem_id)->with('action', 'add')->with('type', 'general-error');
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
        $data = comments::find($id);

        return view('comments.editComment')->with('id', $id)->with('problem_id', $data->problem_id)->with('data', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $data = comments::find($id);
            if ($data) {
                $data->comment = $request->comment;
                $data->type = $request->type;
                if ($data->update()) {
                    return redirect()->route('comments.list', $request->problem_id)->with('action', 'edit')->with('type', 'success');
                } else {
                    return redirect()->route('comments.list', $request->problem_id)->with('action', 'edit')->with('type', 'danger');
                }
            } else {
                return redirect()->route('comments.list', $request->problem_id)->with('action', 'edit')->with('type', 'exists');
            }
        } catch (\Throwable $th) {
            return redirect()->route('comments.list', $request->problem_id)->with('action', 'edit')->with('type', 'general-error');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id, $problem_id)
    {
        try {
            $data = comments::find($id);
            if ($data) {
                if ($data->delete()) {
                    return redirect()->route('comments.list', $problem_id)->with('action', 'delete')->with('type', 'success');
                } else {
                    return redirect()->route('comments.list', $problem_id)->with('action', 'delete')->with('type', 'danger');
                }
            } else {
                return redirect()->route('comments.list', $problem_id)->with('action', 'delete')->with('type', 'exists');
            }
        } catch (\Throwable $th) {
            return redirect()->route('comments.list', $problem_id)->with('action', 'delete')->with('type', 'general-error');
        }
    }

    public function returnSearch($action, $type, $header, $data)
    {
        $m = Messages::mesagesAction($action, $type);

        return view('comments.listComments')
            ->with('titulo', $m[0])
            ->with('message', $m[1])
            ->with('tipo', $m[2])
            ->with('header', $header)
            ->with('data', $data);
    }
}
