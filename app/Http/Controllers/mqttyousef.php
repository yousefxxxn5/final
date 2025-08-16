<?php

namespace App\Http\Controllers;

class mqttyousef
{
    protected $mqtt;

    public function __construct()
    {
        $server = 'localhost'; // استخدم localhost إذا كان Laravel وخادم MQTT على نفس الجهاز
        $port = 1883; // المنفذ الافتراضي لمزود MQTT
        $clientId = 'LaravelClient-' . uniqid(); // معرف فريد للعميل

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
