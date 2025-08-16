<?php

namespace App\Livewire;

use App\Events\MyEvent;
use App\Http\trit\api_trair;
use App\Models\controll_panel;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class LiveWireTest extends Component
{
    use api_trair;

    public function alart()
    {
        event(new MyEvent("alart"));
        session()->flash('message', 'تم إرسال تنبيه!');

    }

    public function bagAlart()
    {
        event(new MyEvent("bag_alart"));

        session()->flash('message', 'تم إرسال تنبيه!');
    }

    public function testTelegram()
    {
        // منطق اختبار التليجرام
        session()->flash('message', 'تم إرسال رسالة Telegram بنجاح!');
    }

    public function testWhatsapp()
    {

        session()->flash('message', 'تم إرسال رسالة whatsapp بنجاح!');
    }

    public function testSms()
    {
        // منطق اختبار SMS

        session()->flash('message', 'تم إرسال رسالة sms بنجاح!');

    }

    public function testAction()
    {
        sleep(1);
        $data = controll_panel::find(Auth::id());
        $m = $this->test_trial(Auth::id(), "test");
        $data->test = 1;
        $data->save();
        $data->test = 0;
        $data->save();
        // منطق الإجراء الذي سيتم تنفيذه عند الضغط على الزر
        session()->flash('message', 'تم تنفيذ الإجراء بنجاح!');
    }
    public function render()
    {
        return view('livewire.live-wire-test');
    }
}
