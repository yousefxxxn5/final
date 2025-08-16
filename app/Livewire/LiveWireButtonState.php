<?php

namespace App\Livewire;

use App\Events\MyEvent;
use App\Jobs\SendTelegramMessageJob;
use App\Models\controll_panel;
use App\Models\telegram;
use App\Models\User;
use App\Models\whatsapp;
use App\Services\TelegramService;
use App\Services\whatsappService;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class LiveWireButtonState extends Component
{
    public $buttonState = 1;
    public $userId;
    public function on_d()
    {

        $telegramService = new TelegramService(telegram::find(Auth::id())->id_user);
        $whatsappSwrvice= new whatsappService();
        $this->userId = controll_panel::find(Auth::id());
        if (!$this->userId) {
            abort(404, 'المستخدم غير موجود في جدول controll_panel');
        }
        $id_user=whatsapp::find(Auth::id())->id_user;
        $this->buttonState = !$this->userId->button_state;
        $this->userId->button_state = $this->buttonState;
        $this->userId->save();
        if ($this->buttonState) {
        SendTelegramMessageJob::dispatch(telegram::where('foruser',Auth::id())->first()->id_user, "تم تشغيل جهازك بنجاح");
        //sent use pusher
        $data = controll_panel::where('id', Auth::id())->first();
        $values = $data->button_state . $data->SWITCH_senser . $data->IR_senser . $data->CAMRA_senser .$data->alart_sound . $data->send_pumm;
          event(new MyEvent($values));

            // $response = $telegramService->sendMessage("تم تشغيل جهازك بنجاح");
            $response = $whatsappSwrvice->sendMessage($id_user,"تم تشغيل جهازك بنجاح");

            session()->flash('on', "تم تشغيل جهازك بنجاح");
        } else {
            session()->flash('off', 'تم الايقاف بنجاح');
        $data = controll_panel::where('id', Auth::id())->first();
            $values = $data->button_state . $data->SWITCH_senser . $data->IR_senser . $data->CAMRA_senser .$data->alart_sound . $data->send_pumm;
            event(new MyEvent($values));
            // $response = $telegramService->sendMessage("تم ايقاف تشغيل جهازك");
        SendTelegramMessageJob::dispatch(telegram::where('foruser',Auth::id())->first()->id_user, "جاري تشغيل الجهاز");

            $response = $whatsappSwrvice->sendMessage($id_user,"تم ايقاف تشغيل جهازك");
        }
    }
    public function mount()
    {
        $this->userId = controll_panel::find(Auth::id());
        if (!$this->userId) {
            abort(404, 'المستخدم غير موجود في جدول controll_panel');
        }
        $this->buttonState = $this->userId->button_state;
    }
    public function render()
    {
        return view('livewire.live-wire-button-state');
    }
}
