<?php

namespace App\Livewire;

use App\Models\telegram;
use App\Models\User;
use App\Models\whatsapp;
use App\Services\TelegramService;
use App\Services\whatsappService;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class UserRegistrationForm extends Component
{
    public $name;
    public $email;
    public $phone;
    public $state;
    public $password;
    public $id;
    public $number_test;
    public $teleurl;

    public function mount($id, $number_test)
    {
        $this->state=telegram::where('exid',$id)->first()->state;
        $this->id = $id;
        $this->number_test = $number_test;
        $this->teleurl = "https://t.me/yamin77846_bot?start=" . urlencode($number_test);
    }
    public function fetchQrCode()
{
    $this->state=telegram::where('exid',$this->id)->first()->state;
    logger()->alert('تم تنفيذ الدالة بسبب hover');
}
    public function register()
    {
        $data=User::where('id',$this->id)->first();
        $tele=telegram::where('id',$this->id)->first();
        $what=whatsapp::where('id',$this->id)->first();
        if(! $tele){
            session()->flash('x', ' ادجل الى تلجرام واضغط على /star');
            // session()->flash('x', $this->id ."sdffffff");
            // $this->reset();
            return;
        }
        if(! $what){
            session()->flash('x', '  ادجل الى ,وتساب واضغط على موافق');
            // session()->flash('x', $this->id ."sdffffff");
            // $this->reset();
            return;
        }
        //state is تطوير لا اخذ التوكن وخاصة بتشفير
        if($tele->state && $what->state){
            if(!$data)
            return 0;
        $data->name=$this->name;
        $data->email=$this->email;
        $data->activeDate=now();
        $data->state=1;
        $data->state_user_serial=1;
        $data->password=Hash::make($this->password);
        $data->phone_number=$this->phone;
        $data->save();

        session()->flash('success', 'Registration successful!');

        $telegramService = new TelegramService($tele->id_user );
           $response = $telegramService->sendMessage($tele->name . " مرحبا بك  " );
        $telegramService = new whatsappService();
           $response = $telegramService->sendMessage($what->id_user ,$tele->name . " مرحبا بك  " );
                // event(new MyEvent('hello world'));

          return redirect()->route("login",)->with("register",'تم التسجيل بنجاح');
    }
    else{
        if(!$tele->state)
        session()->flash('x', 'اضغط على زر التلجرام');
        if(!$what->state)
        session()->flash('x', 'اضغط على زر الوتساب');
    }
        // $this->reset();
    }

    public function render()
    {
        return view('livewire.user-registration-form');
    }
}
