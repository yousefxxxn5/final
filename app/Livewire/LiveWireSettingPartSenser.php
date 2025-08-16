<?php

namespace App\Livewire;

use App\Models\controll_panel;
use App\Models\data_senser;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class LiveWireSettingPartSenser extends Component
{
    public $sw1, $sw2, $sw3, $sw4, $sw5;
    public $ir1, $ir2, $ir3, $ir4;
    public  $fire1, $fire2, $fire3;
    public $dataSenser;

    public function mount()
    {
        // جلب البيانات للمستخدم الحالي
        $this->dataSenser = data_senser::find(Auth::id());

        // تعيين القيم من قاعدة البيانات
        $this->sw1 = $this->dataSenser->sw1;
        $this->sw2 = $this->dataSenser->sw2;
        $this->sw3 = $this->dataSenser->sw3;
        $this->sw4 = $this->dataSenser->sw4;
        $this->sw5 = $this->dataSenser->sw5;

        $this->ir1 = $this->dataSenser->ir1;
        $this->ir2 = $this->dataSenser->ir2;
        $this->ir3 = $this->dataSenser->ir3;
        $this->ir4 = $this->dataSenser->ir4;


        $this->fire1 = $this->dataSenser->fire1;
        $this->fire2 = $this->dataSenser->fire2;
        $this->fire3 = $this->dataSenser->fire3;

    }

    public function updateSettings()
    {
        if ($this->dataSenser) {
            // تحديث القيم بشكل مباشر
            $this->dataSenser->sw1 = $this->sw1;
            $this->dataSenser->sw2 = $this->sw2;
            $this->dataSenser->sw3 = $this->sw3;
            $this->dataSenser->sw4 = $this->sw4;
            $this->dataSenser->sw5 = $this->sw5;

            $this->dataSenser->ir1 = $this->ir1;
            $this->dataSenser->ir2 = $this->ir2;
            $this->dataSenser->ir3 = $this->ir3;
            $this->dataSenser->ir4 = $this->ir4;

            $this->dataSenser->fire1 = $this->fire1;
            $this->dataSenser->fire2 = $this->fire2;
            $this->dataSenser->fire3 = $this->fire3;

            // حفظ التغييرات في قاعدة البيانات
            $this->dataSenser->save();

            // إرسال رسالة نجاح
            session()->flash('alert', 'تم تحديث البيانات بنجاح!');
        } else {
            session()->flash('alert', 'لم يتم العثور على البيانات لتحديثها.');
        }
    }
    public function render()
    {
        return view('livewire.live-wire-setting-part-senser');
    }
}
