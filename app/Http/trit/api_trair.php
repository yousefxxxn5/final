<?php

namespace App\Http\trit;

use App\Jobs\SendTelegramMessageJob;
use App\Models\controll_panel;
use App\Models\telegram;
use App\Models\whatsapp;
use App\Services\TelegramService;
use App\Services\whatsappService;
use Twilio\Rest\Client;

trait api_trair
{

    public function sendtelegram($id, $name) {

        $tele = telegram::where('id', $id)->first();

        if($tele){
        SendTelegramMessageJob::dispatch(telegram::where('foruser',$id)->first()->id_user, $name);

        }
    }
    public function sendSms($id, $name)
    {
        if ($id == 1010) {
            $name = 'SMS Successfully';
        }
        $account_sid = 'AC6e83dd209ff5269ee373e326d3071bec';
        $auth_token = '0193a1a83c5a1223315f9428fe3e29e3';
        $twilio_number = '+19093216351';

        $client = new Client($account_sid, $auth_token);
        $client->messages->create(
            '+967711089421',
            array(
                'from' => $twilio_number,
                'body' => $name
            )
        );
    }

    public function sendWhatsapp($id, $name)
    {
        $what = whatsapp::where('id', $id)->first();
        \Log::info(   'send telegram ok');
        if($what){
            $whatsappService = new whatsappService();
            $response = $whatsappService->sendMessage(  $what->id_user,$name  );
            \Log::info(   $response);
        }
    }
    public function test_trial($id, $name){
        \Log::notice("test:   " . $name ."         id= ". $id);
        \Log::notice("test:   "  . $name . "         id= ".  $id);
        \Log::notice("test:   "  . $name ."         id= ". $id);
        return 0;

    }

    public function api_controll($id, $name)
    {


        $data = controll_panel::find($id);
        if ($data->button_state == 1  ) {

            if ($data->send_sms || $data->test) {
                //   $this->sendSms($id,$name);
                \Log::notice("sms open   " . $name . $id);
            } else
                \Log::info("sms clase  "  . $name . $id);
            ///////////////////////
            if ($data->send_whatapp || $data->test) {
                // $this->sendWhatsapp($id, $name);
                \Log::notice("whatsapp open  "  . $name . $id);
            } else
                \Log::info("whatsapp clase  "  . $name . $id);


            if ($data->send_emil) {
                $this->sendtelegram($id, $name);
            } else {
                \Log::info("emil clase  "  . $name . $id);
            }

            \Log::notice("send ook 00  "  . $name . $id);

            // إرجاع الاستجابة بصيغة JSON
            return $name;
        } else {
            \Log::info(message: "system is clase from platform user "  . $name . $id);
            return "system is clase from platform user";
        }
    }
}
