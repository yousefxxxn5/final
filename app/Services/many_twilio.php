<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Twilio\Rest\Client;

class many_twilio
{
    private $botToken;
    private $chatId;
    private $httpClient;

    public function __construct()
    {



    }
    public function getBalance()
    {
        $sid = 'AC8eee6335400e4832f47f154bb51c7e4a'; // حسابك SID
        $token = '9e7eeee24b8d3fe44b759a4d0311d199'; // حسابك Auth Token

        // إرسال طلب إلى Twilio API للحصول على الرصيد
        $response = Http::withBasicAuth($sid, $token)
            ->get('https://api.twilio.com/2010-04-01/Accounts/'.$sid.'/Balance.json');

        // إذا كان الطلب ناجحًا
    if ($response->successful()) {
            return [
                'balance' => $response->json('balance'),
                'currency' => $response->json('currency'),
            ];
        } else {
            return response()->json([
                'error' => 'Failed to fetch balance',
                'details' => $response->body(),
            ], 500);
        }
    }
}
