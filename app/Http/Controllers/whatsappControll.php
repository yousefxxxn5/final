<?php

namespace App\Http\Controllers;

use App\Models\controll_panel;
use App\Models\whatsapp;
use App\Services\whatsappService;
use Illuminate\Http\Request;

class whatsappControll extends Controller
{
    public function handleWebhook(Request $request)
    {

         $data = $request->all();
         \Log::info($request);
        $smsMessageSid = $data['SmsMessageSid'];
        $profileName = $data['ProfileName'];
        $messageType = $data['MessageType'];
        $body = $data['Body'];
        $from = $data['From'];
        $from = str_replace("whatsapp:", "", $from);
        $to = $data['To'];
        $what = whatsapp::where('id_user', $from)->first();

        if ($what ) {
            \Log::info("الجهاز يعمل بل فعل");

            $whatsappService = new whatsappService();
            $control = controll_panel::find($what->id)->first();
            if ($body == 'تشغيل') {
                if ($control->button_state) {
                    $response = $whatsappService->sendMessage($what->id_user, "الجهاز يعمل بل فعل");
                    \Log::info("الجهاز يعمل بل فعل");
                } else {
                    $control->button_state = 1;
                    $control->save();
                    $response = $whatsappService->sendMessage($what->id_user, "جاري تشغيل الجهاز");
                    \Log::info("جاري تشغيل الجهاز");
                }
            }
            if ($body == 'ايقاف') {
                if (!$control->button_state) {
                    $response = $whatsappService->sendMessage($what->id_user, "الجهاز لا يعمل بل فعل");
                    \Log::info("الجهاز لا يعمل بل فعل");
                } else {
                    $control->button_state = 0;
                    $control->save();
                    $response = $whatsappService->sendMessage($what->id_user, "تم ايقاف الجهاز");
                    \Log::info(" تم ايقاف الجهاز");
                }
            }
            return response()->json(['status' => 'ok']);
        }
        $what = whatsapp::where('number_test', $body)->first();
        if ($what) {

            $what->name = $profileName;

            $what->id_user = $from;
            $what->state = 1;
            $what->save();
            \Log::info($what);
            return response('Message received', 200);
        }



        return response('Message received', 200);
    }
}
