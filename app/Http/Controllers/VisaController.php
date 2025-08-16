<?php

namespace App\Http\Controllers;

use App\Models\visa;
use Illuminate\Http\Request;

class VisaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('fram.bank.visa_bank');
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
    public function show(visa $visa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(visa $visa)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, visa $visa)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(visa $visa)
    {
        //
    }
}
