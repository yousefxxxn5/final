<?php

namespace App\Services;

use App\Models\notifications;
use GuzzleHttp\Client;

class notificationsService
{
    private $id;
    private $name;
    private $type;
    private $body;
    private $see;
    private $img;


    // Constructor لتلقي القيم
    public function __construct($id ,$name, $type, $body, $see, $img)
    {

        $this->name = $name;
        $this->type = $type;
        $this->body = $body;
        $this->see = $see;
        $this->img = $img;
        $this->id = $id;

    }
    // Method لحفظ الإشعار
    public function save()
    {
        $notif=new notifications;
        if (str_contains($this->type, 'SW')) {
        $this->body=" فتح ".$this-> name ."";
        $notif->img = 'fa-door-open';
        }

        if (str_contains($this->type, 'IR')) {
        $this->body=" استشعر حساس  ".$this-> name ." شيء ما ";
        $notif->img = 'fa-eye';
        }
        if (str_contains($this->type, 'IR')) {
        $this->body=" استشعر حساس  ".$this-> name ." شيء ما ";
        $notif->img = 'fa-eye';
        }
        if (str_contains($this->type, 'fire')) {
        $this->body=" استشعر حساس  ".$this-> name ." وجود حريق ";
        $notif->img = 'fa-fire';
        }
         $notif->user_id = $this->id;
        $notif->name = $this->name;
        $notif->type = $this->type;
        $notif->body = $this->body;
        $notif->see = $this->see;

        $notif->save();
    }
    public function update()
    {

    }


}
