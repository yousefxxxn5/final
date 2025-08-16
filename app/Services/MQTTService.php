<?php

namespace App\Services;

use Bluerhinos\phpMQTT;

class MQTTService
{
    protected $mqtt;

    public function __construct()
    {
        $server = '127.0.0.1:8000'; // استخدم localhost إذا كان Laravel وخادم MQTT على نفس الجهاز
        $port = 8000; // المنفذ الافتراضي لمزود MQTT
        $clientId = 'LaravelClient778467871' . uniqid(); // معرف فريد للعميل

        $this->mqtt = new phpMQTT($server, $port, $clientId);
        if (!$this->mqtt->connect()) {
            exit(1);
        }
    }

    public function publish($topic, $message)
    {
        $this->mqtt->publish($topic, $message, 0);
    }

    public function subscribe($topic)
    {
        $this->mqtt->subscribe([$topic => 0]);
        while ($this->mqtt->proc()) {
            // المعالجة هنا
        }
    }

    public function __destruct()
    {
        $this->mqtt->close();
    }
}
