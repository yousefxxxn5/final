<?php

namespace App\Http\Controllers;

use App\Models\controll_panel;
use App\Models\User;
use Illuminate\Http\Request;

class user_table extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users= User::all();
        return view('fram.user_table',compact('users'));
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
        $data=User::find($id);
        return view('fram.edit', ['data' => $data]);
    }

    /**

     */
    public function update(Request $request, string $id)
    {

    $data = User::find($id);


    if (!$data) {
    session()->flash('massges', 'حدث خطاء');

        return response()->json(['message' => 'User not found'], 404);
    }



    $data->name = $request->name;
    $data->is_twoilo = $request->is_twoilo; // is_twoilo
     $data->twoilo_code = $request->twoilo_code;
     $data->is_valid = $request->is_valid;
    //  $data->email = $request->email;
     $data->whatsAppNumber = $request->whatsAppNumber;
    $data->whatsAppToken = $request->whatsAppToken;
    $data->whatsAppTo = $request->whatsAppTo;
    $data->whatsAppFrom = $request->whatsAppFrom;
    $data->whatsAppMassege = $request->whatsAppMassege;
    $data->EmailNumber = $request->EmailNumber;
    $data->EmailToken = $request->EmailToken;
    $data->EmailTo = $request->EmailTo;
    $data->EmailFrom = $request->EmailFrom;
    $data->EmailMassege = $request->EmailMassege;
    $data->smsNumber = $request->smsNumber;
    $data->smsToken = $request->smsToken;
    $data->smsFrom = $request->smsFrom;
    $data->smsTo = $request->smsTo;
    $data->smsMassege = $request->smsMassege;


    session()->flash('massges', 'تمت العملية بنجاح!');
    $data->save();
    return redirect()->route('user_table.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
