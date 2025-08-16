<?php

namespace App\Http\Controllers;

use App\Http\trit\api_controll;
use App\Http\trit\api_trair;
use App\Models\buttery;
use App\Models\controll_panel;
use App\Models\data_senser;
use App\Services\many_twilio;
use App\Services\notificationsService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class controll__api extends Controller
{

    use api_trair;


    public function decat(Request $request)
    {
        $info_battery = $request->json()->all();

        // استخراج القيم من البيانات
        $id = $info_battery['id'] ?? null;
        $battery = $info_battery['battery'] ?? null;
        $electrical = $info_battery['electrical'] ?? null;



        $buttery=buttery::where('id',$id)->first();
        $data = controll_panel::find($id)->first();
        // \Log::info("button_state: " . $name . '    id user:  ' . $id);
        // $many = new many_twilio;
        // $s = $many->getBalance();
        // \Log::info($s);

        if($buttery->state == 0 ){
            $buttery->state=1;
            $buttery->change=1;
            $buttery->velue=$battery;
            $buttery->charge=$electrical;
            $buttery->save();
        }
        if ($data->connected == 0) {
            $data->connected = 1;
            $data->save();
        }
        \Log::info('Received Data:', [
            'id' => $id,
            'battery' => $battery,
            'electrical' => $electrical,
        ]);
         return $data->button_state . "" . $data->SWITCH_senser . '' . $data->IR_senser . '' . $data->CAMRA_senser . ''.$data->alart_sound.''.$data->send_pumm;
    }
    public function IR_SENSER($id, $name)
    {
        $data = controll_panel::find($id);
        if ($data->IR_senser) {
            $data_senser = data_senser::where('id', $id)->pluck($name)->first();
            $name = 'حدث اختراق امني في مستشعر' . $data_senser . ' رقم المستخدم  ' . $id;
            return $this->api_controll($id, $name);
        } else {
            \Log::info("IR_senser is not enable"  . $name . $id);
            return 'IR_senser is not enable';
        }
    }
    public function dataSenser(Request $request)
    {
        $data = $request->json()->all();
        \Log::info($data);

        $id = $data['id'] ?? null;
        $name = $data['name'] ?? null;

        $data = controll_panel::find($id);

        if ($data->SWITCH_senser && $data->button_state) {

            $data_senser = data_senser::where('id', $id)->pluck($name)->first();
            if (!$data_senser)
                return $data_senser;
            $notif = new notificationsService($id, $data_senser, $name, "no body", 0, "noimg");
            $notif->save();
            if (str_contains($name, 'SW')) {
                $name = '⚠️ تنبيه أمني: تم اكتشاف محاولة اختراق في مفتاح : ' . $data_senser . '.';
            }
            if (str_contains($name, 'IR')) {
                $name = '⚠️ تنبيه أمني: تم اكتشاف حركة مريبة بواسطة مستشعر الأشعة تحت الحمراء الخاص بل : ' . $data_senser . '.';
            }
            if (str_contains($name, 'fire')) {
                $name = '🔥 إنذار طارئ: تم رصد حالة حريق عبر مستشعر حريق: ' . $data_senser . '.';
            }


            return $this->api_controll($id, $name);
        } else {
            \Log::info("sw is not enable"  . $name . $id);
            return 'SWITCH_senser is not enable';
        }
    }
    public function STATE_SETTING($id, $name)
    {
        $data = controll_panel::find($id);
        $data = [
            'message' => 'Hello, Laravel!',
            'status' => 'success'
        ];


        return '{1}';
    }
    public function CAM_SENSER($id, $name)
    {
        $data = controll_panel::find(1);
        if ($data->CAMRA_senser) {
            $name = 'Camra sensor No.' . $id . ' detected strange movement ';

            return  $this->api_controll($id, $name);
        } else {
            \Log::info("CAMRA_senser is not enable "  . $name . $id);
            return 'CAMRA_senser is not enable';
        }
    }

    public function test()
    {
        $data = controll_panel::find(Auth::id());
        $m = $this->test_trial(Auth::id(), "test");
        $data->test = 1;
        $data->save();
        $data->test = 0;
        $data->save();
    }

    public function handleWebhook(Request $request)
    {


        // $update = $request->all();



        \Log::info($request);


        // $chatId = $update['message']['chat']['id'];
        // $text = $update['message']['text'];

        ;

        return response()->json(['status' => 'ok']);
    }
}
