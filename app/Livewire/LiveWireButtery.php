<?php

namespace App\Livewire;

use App\Models\buttery;
use App\Models\User;
use Auth;
use Carbon\Carbon;
use Livewire\Component;

class LiveWireButtery extends Component
{
    public $charge;

    public $many;
    public $battery_level=10;
    public $buttery_info;
    public $velue;
    public $change;
    protected $listeners = [
        'bbbbbbbbbbbbb' => 'update_buttery'
    ];
    public function mount()
    {
        $this->buttery_info=buttery::where('id',auth()->id())->first();




    }
    public function update_buttery(){

        $this->buttery_info=buttery::where('id',auth()->id())->first();

    }
    public function render()
    {

         $this->many=User::where("id",auth()->id())->first()->many;
        

        return view('livewire.live-wire-buttery');
    }
}
