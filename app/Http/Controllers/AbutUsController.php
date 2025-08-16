<?php

namespace App\Http\Controllers;

use App\Models\abut_us;
use Illuminate\Http\Request;

class AbutUsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('fram.abutus.Abut_us');
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
    public function show(abut_us $abut_us)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(abut_us $abut_us)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, abut_us $abut_us)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(abut_us $abut_us)
    {
        //
    }
}
