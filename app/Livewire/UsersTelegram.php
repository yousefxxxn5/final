<?php

namespace App\Livewire;

use App\Models\telegram;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class UsersTelegram extends Component
{
    public $number_test=00;
    public $teleurl='0000';
    public $users;

    public function mount()
    {
        $this->users = Telegram::where('exid', Auth::id())->get();
    }

    public function updateRole($id, $newRole)
    {
        $user = Telegram::find($id);
        if ($user) {
            $user->role = $newRole;
            $user->save();
        $this->users = Telegram::where('exid', Auth::id())->get();

            // إعادة تحميل البيانات
            session()->flash('message', 'تم تحديث الصلاحيات.');
        }
    }

    public function delete($id)
    {

        $user = Telegram::find($id);
        if ($user ) {
            $user->delete();
            $this->users = Telegram::where('exid', Auth::id())->get();

            session()->flash('message', 'تم حذف المستخدم.');
        }
    }
    public function add_user_telegram()
    {
       $tele= new telegram();
       $tele->number_test= telegram::where('id', Auth::id())->first()->number_test .
       'yamin'. Telegram::where('exid', Auth::id())->latest()->first()->id;

       + 1;

       $tele->exid=Auth::id();
       $tele->foruser=Auth::id();
       $tele->save();
    $this->teleurl = 'https://t.me/yamin77846_bot?start=' . urlencode(telegram::latest()->first()->number_test);

        $this->dispatch('open-telegram-modal');

        $this->users = Telegram::where('exid', Auth::id())->get();
    }
    public function selectRow($id)
{
    $this->teleurl = 'https://t.me/yamin77846_bot?start=' . urlencode(telegram::where('id',$id)->first()->number_test);
    if(telegram::where('id',$id)->first()->state ==0)
    $this->dispatch('open-telegram-modal');
    // \Log::info($id ."user trl");
}

    public function render()
    {
        return view('livewire.users-telegram');
    }
}
