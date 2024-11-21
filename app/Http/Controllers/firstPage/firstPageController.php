<?php

namespace App\Http\Controllers\firstPage;

use App\Http\Controllers\Controller;
use App\Models\Photos;
use App\Models\Problem;
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
            $photos = Photos::where('problem_id','=',$value->id)->first();
            $value->path = isset($photos) ? $photos->path : '';
        }
        // $data = Photos::with('problem')->paginate(10);
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
    public function destroy(string $id)
    {
        //
    }
}
