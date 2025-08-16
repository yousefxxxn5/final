<?php

namespace App\Services;

use App\Models\buttery;
use App\Models\controll_panel;
use Twilio\Rest\Client;

class pross
{
    private $data;

    public function __construct()
    {

        // $this->data=controll_panel::where('button_state',true)->where('connected','0')->where('sending','0')->get();
        // foreach ($this->data as $value) {
        //     // $value->sending=0;

        //     $value->save();
        //     \Log::info('erroe'. $value);
        // }

        // $refesh_divces=controll_panel::where('button_state',true)->get();
        // foreach ($refesh_divces as $value) {
        //      $value->connected=0;
        //     $value->save();
        //     \Log::info('erroe'. $value);
        // }
        $refesh_setting=buttery::all();
        foreach ($refesh_setting as $value) {
            if($value->state)
           \Log::info('okk'. $value);
        else{
            $value->velue=-1;
            $value->charge=0;
            $value->change=0;
            \Log::info('erroe in buttery'. $value);
        }

        $value->state=0;
           $value->save();
       }

    }
    public function get_data( )
    {
       return $this->data;
    }
    public function sendMessage( )
    {
       return $this->data;
    }
}
