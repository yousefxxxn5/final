<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Twilio\Rest\Client;

class whatsappService
{
    private $botToken;
    private $chatId;
    private $httpClient;
        public $sid = "AC8eee6335400e4832f47f154bb51c7e4a";
        public $token = "9e7eeee24b8d3fe44b759a4d0311d199";
    public function __construct()
    {


    }
    public function sendMessage( $id , $name)
    {
        $many=User::where('id',$id)->first();
        if($many){
        $many->many=$many->many - 0.01;
        $many->save();
    }
        // try {

        //     $twilio = new Client($this->sid, $this->token);

        //     $message = $twilio->messages
        //         ->create(
        //             "whatsapp:".$id ,
        //             array(
        //                 "from" => "whatsapp:+14155238886",
        //                 "body" => $name
        //             )
        //         );
        // } catch (\Exception $e) {
        // }
        return 0;
    }
}
