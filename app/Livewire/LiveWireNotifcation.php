<?php

namespace App\Livewire;

use App\Models\notifications;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class LiveWireNotifcation extends Component
{

    public  $notif ;
    public  $state=0 ;
    public  $many=10 ;
    protected $listeners = ['click_ok' => 'handleClickOk'];


    public function mount()
    {
        $this->notif=notifications::where('user_id', Auth::id())
        ->orderBy('created_at', 'desc')
        ->get();
        $this->many=User::where('id',Auth::id())->first()->many;
    }
    public function handleClickOk(){
        $this->state= $this->state+1;
        $notifs = notifications::where('user_id', Auth::id())
        ->where(function ($query) {
            $query->where('see', 0)
                  ->orWhere('see', 1);
        })
        ->orderBy('created_at', 'desc')
        ->get();
        if($notifs->isNotEmpty()){
        foreach ($notifs as $notif) {
            if( $notif->see == 1){
                $notif->see = 2; // تحديث الحقل إلى 1
                $notif->save(); // حفظ التغيير في قاعدة البيانات
            }
            if( $notif->see == 0){
                $notif->see = 1; // تحديث الحقل إلى 1
                $notif->save(); // حفظ التغيير في قاعدة البيانات
            }
        }
     }
    $this->notif=notifications::where('user_id', Auth::id())
        ->orderBy('created_at', 'desc')
        ->get();
    }


    public function render()
    {
        session()->flash('ok', 'تم الايقاف بنجاح');
        return view('livewire.live-wire-notifcation');
    }
}
