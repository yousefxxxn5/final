<?php

namespace Database\Seeders;

use App\Models\buttery;
use App\Models\controll_panel;
use App\Models\data_senser;
use App\Models\notifications;
use App\Models\telegram;
use App\Models\User;
use App\Models\whatsapp;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class seeder_frist extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::create([
            'name' => "yousef",
            'email' => 'yousef@gmail.com',
            'is_twoilo' => '1',
            'is_valid' => '1',
            'Username' => '104575277',
            'Serial_number' => '100215311',
            'channel'=>'channel' . '104575277',

            'password' => Hash::make("778467871"),
        ]);
        $data =new controll_panel();

        $data->name="yousef";
        $data->IR_senser=1;
        $data->SWITCH_senser=1;
        $data->button_state=0;
        $data->CAMRA_senser=1;
        $data->test=0;



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
       $tel=new telegram();
       $tel->name='yousef';
       $tel->id_user='1351024593';
       $tel->state='1';
       $tel->foruser='1';
       $tel->number_test='156';

       $tel->exid=1;
       $tel->role='Admin';
       $tel->save();
       $what=new whatsapp();
       $what->name='yousef';
       $what->exid=1;
       $what->role='Admin';
       $what->foruser='1';

       $what->id_user='+967714229743';
       $what->state='1';
       $what->number_test='156';
       $what->save();
       $but= new buttery();

        $but->save();


       Role::create(['name' => 'user']);
       Role::create(['name' => 'admin']);
       Permission::create(['name' => 'manage']);
       $role = Role::findByName('admin');
       $role->givePermissionTo('manage');

       $user = User::find(1)->assignRole('admin');


    }
}
