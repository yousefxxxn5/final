<?php

namespace App\Http\Controllers;

use App\Models\controll_panel;
use App\Models\telegram;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class confg_user_controll extends Controller
{

    public function index()
    {
        return view('fram.confg-user');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() {}

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = User::where('Serial_number', $request->Serial_number)->where('Username', $request->Username)->first();
        //  return $tele;
        if (!$data) {
            return redirect()->back()->with('error', 'Serial is error empty');
        } else {
            if($data->state_user_serial)
            return redirect()->back()->with('error', 'Serial is active in devices');

            $tele = telegram::where('exid', $data->id)->first();
            return  view('fram.enter_first_data', ['user_id' => $data->id,'number_test'=>$tele->number_test]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {

    }

    public function update(Request $request, string $id)
    {
       $data=User::where('id',$id)->first();
       if(!$data)
       return 0;
    $data->name=$request->name;
    $data->email=$request->email;
    $data->password=Hash::make($request->password);
    $data->phone_number=$request->phone;
    // $data->state_user=1;
    $data->save();
    return redirect()->route("login");

    }



    public function destroy(string $id)
    {
        //
    }
}
