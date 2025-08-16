<?php

namespace App\Http\Controllers;

use App\Models\controll_panel;
use App\Models\data_senser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Route;

class setting extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
    $data_senser = data_senser::find(Auth::id());
        $data=controll_panel::find(Auth::id());
        return view('fram.setting')->with(['key'=>$data,'data_senser' => $data_senser]);
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
        return $request;
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
    public function update(Request $request, $id)
    {
        $dataSensor = data_senser::find($id);
        if ($dataSensor) {
            $dataSensor->sw1 = $request->input('sw1');
            $dataSensor->sw2 = $request->input('sw2');
            $dataSensor->sw3 = $request->input('sw3');
            $dataSensor->sw4 = $request->input('sw4');
            $dataSensor->sw5 = $request->input('sw5');
            $dataSensor->ir1 = $request->input('ir1');
            $dataSensor->ir2 = $request->input('ir2');
            $dataSensor->ir3 = $request->input('ir3');
            $dataSensor->ir4 = $request->input('ir4');


            $dataSensor->save();

            return redirect()->back()->with('s', 'تم تحديث البيانات بنجاح!');

    }
}
    public function MyUpdate(Request $request ,$id)
    {
        $data= controll_panel::find($id);
        $data->IR_senser=$request->IR_senser;
        $data->SWITCH_senser=$request->SWITCH_senser;
        $data->CAMRA_senser=$request->CAMRA_senser;







        $data->alart_sound=$request->alart_sound;
        $data->saaaq_electrical=$request->saaaq_electrical;
        // $data->send_sms=$request->send_sms;
        $data->send_whatapp=$request->send_whatapp;
        $data->send_telegram=$request->send_emil;
        $data->send_pumm=$request->send_pumm;
        $data->send_eleictrical=$request->send_eleictrical;
        $data->send_network=$request->send_network;
       $data->save();
    //   session()->flash('key', $data);
    session()->flash('massges', 'تمت التعديل بنجاح!');

     return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

    }

}
