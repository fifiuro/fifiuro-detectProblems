<?php

namespace App\Http\Controllers\problem;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class problemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('principal');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('problem.problem');    }

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
