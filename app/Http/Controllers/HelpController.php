<?php

namespace App\Http\Controllers;

use App\Models\help;
use Illuminate\Http\Request;

class HelpController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('fram.help.help');
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
    public function show(help $help)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(help $help)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, help $help)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(help $help)
    {
        //
    }
}
