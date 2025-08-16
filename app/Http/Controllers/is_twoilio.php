<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class is_twoilio extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('fram.twoilio');
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
        return 0;
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
        $data= User::find($id);
        $data->is_twoilo=1;
         $data->twoilo_code=$request->code;
        $data->save();
        return redirect()->route('data.index');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return 'ddddddddddddddddddddddddddddddd';
        //
    }
}
