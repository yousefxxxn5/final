<?php

namespace App\Http\Controllers;

use App\Models\buttery;
use App\Models\controll_panel;
use App\Models\data_senser;
use App\Models\manage;
use App\Models\telegram;
use App\Models\User;
use App\Models\whatsapp;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ManageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
      return view('fram.add_user');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        // $user = new User();
        // $user->name = 'no user';
        //  $user->password = '0000';
        //  $user->Username = $request->Username;
        // $user->Serial_number = $request->Serial_number;
        // $user->state_user_serial = '0';
        // $user->save();
        // $data =new controll_panel();

        // $data->name='no user';
        // $data->IR_senser=1;
        // $data->SWITCH_senser=1;
        // $data->button_state=0;
        // $data->CAMRA_senser=1;
        // $data->test=0;

        // $data->n1_sms='0000';
        // $data->n2_sms="0";
        // $data->n3_sms="0";

        // $data->n1_whatapp="0";
        // $data->n2_whatapp="0";
        // $data->n3_whatapp="0";

        // $data->n1_email='0';
        // $data->n2_email="0";
        // $data->n3_email="0";

        // $data->alart_sound=1;
        // $data->saaaq_electrical=1;
        // $data->send_sms=1;
        // $data->send_whatapp=1;
        // $data->send_emil=1;
        // $data->send_pumm=1;
        // $data->send_eleictrical=1;
        // $data->send_network=1;
        // $data->save();
        // $senser=new data_senser();
        // $senser->save();
        // $tel= new telegram();
        // $tel->number_test='x'. $request->Serial_number*2 .'x';
        // $tel->save();
        // $what= new whatsapp();
        // $what->number_test=$request->Serial_number*2 ;
        // $what->save();
        // $but= new buttery();
        // $but->save();

        session()->flash('add_user', 'تمت العملية بنجاح!');

        return redirect()->route('data.index');


       //$user = User::find(1)->assignRole('admin');
    }

    /**
     * Display the specified resource.
     */
    public function show(manage $manage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(manage $manage)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, manage $manage)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(manage $manage)
    {
        //
    }
}
