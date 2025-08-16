<?php

namespace App\Jobs;

use App\Models\telegram;
use GuzzleHttp\Client;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class SendTelegramMessageJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $id;
    protected $message;
    protected $botToken;

    public function __construct($id, $message)
    {
        // \Log::info('xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx is running!');
        $this->id = $id;
        $this->message = $message;
        $this->botToken = '7759882800:AAFy-m_JzQJC10Q85C391u_ym-dxVVrueFs'; // من الأفضل استخدام env
    }

    public function sendMessage($chatId, $message)
    {
        $client = new Client(['base_uri' => 'https://api.telegram.org']);

        $url = "/bot{$this->botToken}/sendMessage";
        $response = $client->post($url, [
            'json' => [
                'chat_id' => $chatId,
                'text' => $message,
            ]
        ]);

        return json_decode($response->getBody(), true);
    }

    public function handle()
    {
        // جلب المستخدم الذي أرسل الأمر
        $sender = telegram::where('id_user', $this->id)
                          ->where('state', 1)
                          ->first();

        if (!$sender) return;

        $foruser = $sender->foruser;

        // جلب جميع المستلمين المرتبطين بـ exid
        $users = telegram::where('exid', $foruser)
                         ->where('state', 1)
                         ->get();

        foreach ($users as $user) {
            $this->sendMessage($user->id_user, $this->message);
        }
    }
}
