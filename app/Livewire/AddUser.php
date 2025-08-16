<?php

namespace App\Livewire;
use App\Models\buttery;
use App\Models\controll_panel;
use App\Models\data_senser;
use App\Models\telegram;
use App\Models\User;
use App\Models\whatsapp;
use Livewire\Component;

class AddUser extends Component
{
    public $username;
    protected $listeners = ['click_ok' => 'click_ok'];
    public $add_username=36985;
    public $add_serialnumber=13126;
    public $serial_number;
    public $id;
    protected $rules = [
        'username' => 'required|string|max:255',
        'serial_number' => 'required|string|max:255',
    ];

        public function mount()
    {
        $lastuser = User::orderBy('id', 'desc')->first();
        $this->username = $lastuser->Username ;
        $this->serial_number =$lastuser->Serial_number;
        $this->id=$lastuser->id;


    }
    public function genration()
    {
        $lastuser = User::orderBy('id', 'desc')->first();
        $user = new User();
        $user->name = 'no user';
         $user->password = '0000';
         $user->Username = intval($lastuser->Username) +  $this->add_username ;;
        $user->Serial_number = intval($lastuser->Serial_number) +$this->add_serialnumber ;
        $user->state_user_serial = '0';
        $user->channel='channel' . intval($lastuser->Username) +  $this->add_username;
        $user->save();
        $data =new controll_panel();
        $data->name='no user';
        $data->IR_senser=1;
        $data->SWITCH_senser=1;
        $data->button_state=0;
        $data->CAMRA_senser=1;
        $data->test=0;
        // $data->n1_sms='0000';
        // $data->n2_sms="0";
        // $data->n3_sms="0";
        // $data->n1_whatapp="0";
        // $data->n2_whatapp="0";
        // $data->n3_whatapp="0";
        // $data->n1_email='0';
        // $data->n2_email="0";
        // $data->n3_email="0";
        $data->alart_sound=1;
        $data->saaaq_electrical=1;
        $data->send_sms=1;
        $data->send_whatapp=1;
        $data->send_telegram=1;
        $data->send_pumm=1;
        $data->send_eleictrical=1;
        $data->send_network=1;
        $data->save();
        $senser=new data_senser();
        $senser->save();
        $tel= new telegram();
        // \Log::info(User::latest('id')->first()->id);

        $tel->foruser=(int)User::latest('id')->first()->id;
        $tel->number_test = 'x' . ((int)$this->serial_number * 2) . 'x';
        $tel->exid=User::latest()->first()->id;
        $tel->role='Admin';

        $tel->save();
        $what= new whatsapp();
         $what->number_test= ((int)$this->serial_number * 2) ;


         $what->role='Admin';
         $what->foruser=(int)User::latest('id')->first()->id;
        $what->save();
        $but= new buttery();
        $but->save();

        session()->flash('add', 'تم اضافة مستخدم جديد ارجاء تفليش الكود ');
        session()->flash('message', 'تمت العملية بنجاح!');

        // return redirect()->route('data.index');
        $lastuser = User::orderBy('id', 'desc')->first();
        $this->username = $lastuser->Username ;
        $this->serial_number =$lastuser->Serial_number;
        $this->id=$lastuser->id;
    }
    public function render()
    {
        return view('livewire.add-user');
    }
}
