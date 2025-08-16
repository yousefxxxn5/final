<?php

namespace App\Livewire;

use App\Models\telegram;
use App\Models\whatsapp;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class UserWhatsaap extends Component
{
    public $number_test = 00;
    public $teleurl = '0000';
    public $users;
    public $showUserModal = false;

    public $whatsurl = '0000';


    public function mount()
    {
        $this->users = Whatsapp::where('exid', Auth::id())->get();
    }

    public function updateRole($id, $newRole)
    {
        $user = Whatsapp::find($id);
        if ($user) {
            $user->role = $newRole;
            $user->save();
            $this->users = Whatsapp::where('exid', Auth::id())->get();
            session()->flash('message', 'تم تحديث الصلاحيات.');
        }
    }

    public function delete($id)
    {
        $user = Whatsapp::find($id);
        if ($user) {
            $user->delete();
            $this->users = Whatsapp::where('exid', Auth::id())->get();
            session()->flash('message', 'تم حذف المستخدم.');
        }
    }

    public function add_user_whatsapp()
    {
        $whats = new whatsapp();
        $whats->number_test = whatsapp::where('id', Auth::id())->first()->number_test .
            'yamin' . whatsapp::where('exid', Auth::id())->latest()->first()->id + 1;

        $whats->exid = Auth::id();
        $whats->foruser = Auth::id();
        $whats->save();

        $this->whatsurl = 'https://wa.me/?text=' . urlencode(Whatsapp::latest()->first()->number_test);

        $this->dispatch('open-whatsapp-modal');

        $this->users = Whatsapp::where('exid', Auth::id())->get();
    }

    public function selectRow($id)
    {
        $this->whatsurl = 'https://wa.me/?text=' . urlencode(Whatsapp::where('id', $id)->first()->number_test);

        if (Whatsapp::where('id', $id)->first()->state == 0) {

            $this->dispatch('open-telegram-modal');
        }
    }

    public function render()
    {
        return view('livewire.user-whatsaap');
    }
}
