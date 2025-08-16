<?php

namespace App\Services;

use App\Models\telegram;
use GuzzleHttp\Client;

class TelegramService
{
    private $botToken;
    private $chatId;
    private $httpClient;

    public function __construct($id)
    {
        $this->botToken = '7759882800:AAFy-m_JzQJC10Q85C391u_ym-dxVVrueFs'; // أضف هذا في ملف .env
        $this->chatId = $id;
        $this->httpClient = new Client(['base_uri' => 'https://api.telegram.org']);
    }
    public function sendMessage($message)
    {

        $url = "/bot{$this->botToken}/sendMessage";
        $n=$message;
        $response = $this->httpClient->post($url, [
            'json' => [
                'chat_id' => $this->chatId,
                'text' => $message
            ]
        ]);

        return json_decode($response->getBody(), true);
        // return 0;
    }
    public function sendToAll($message)
{
    // جلب جميع المستخدمين الذين أرسل لهم هذا exid (المرسل) والحالتهم مفعّلة
    $foruser = telegram::where('id_user', $this->chatId)
                    ->where('state', 1)
                    ->first()->foruser;
                    $users = telegram::where('exid', $foruser)
                    ->where('state', 1)
                    ->get();
                    \Log::info( $users );

    foreach ($users as $user) {
        $this->chatId = $user->id_user; // foruser = id_user في قاعدة البيانات
         $this->sendMessage($message);   // إرسال الرسالة لكل مستخدم
        \Log::info('send');
    }

    return "تم الإرسال إلى " . count($users) . " مستخدم";
}
}
