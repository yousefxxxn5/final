<?php

namespace App\Http\Controllers;

use App\Jobs\SendTelegramMessageJob;
use App\Models\controll_panel;
use App\Models\telegram;
use App\Services\TelegramService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class telgram extends Controller
{
public $chatIds;
    public function handleWebhook(Request $request)
{
    $data = $request->all();
    $chatId = $data['message']['chat']['id'] ?? null;
    $this->chatIds = $data['message']['chat']['id'] ?? null;
    $firstName = $data['message']['chat']['first_name'] ?? null;
    $username = $data['message']['chat']['username'] ?? null;
    $text = $data['message']['text'] ?? null;
    $text = str_replace("/start ", "", $text);

    if ($this->isRegisteredUser($chatId)) {
        $this->processCommand($chatId, $text);
    } else {
        $this->registerUser($text, $chatId, $firstName);
    }

    return response()->json(['status' => 'ok']);
}
private function isRegisteredUser($chatId): bool
{
    return telegram::where('id_user', $chatId)->exists();
}

private function processCommand($chatId, $text): void
{

    $tele = telegram::where('id_user', $chatId)->first();

    $telegramService = new TelegramService($tele->id_user);
    $exit = telegram::where('number_test', $text)->first();
    if ($exit) {
        $telegramService->sendMessage("عذرا
        هذا الحساب موجود بل فعل");
        return ;
    }
    if($tele->role=="user")
    {
        $telegramService->sendMessage("عذرا \n
ليس لديك الصلاحيات لتشغيل او ايقاف عمل الجهاز    ");
return ;
}
    $control = controll_panel::find($tele->foruser);

    if ($text == 'تشغيل') {
        $this->handleStartCommand($control, $telegramService);
    } elseif ($text == 'ايقاف') {
        $this->handleStopCommand($control, $telegramService);
    }
}

private function handleStartCommand($control, $telegramService): void
{
    if ($control->button_state) {
        \Log::info("الجهاز يعمل بالفعل");
        $telegramService->sendMessage("الجهاز يعمل بل فعل");
    } else {
        $control->button_state = 1;
        $control->save();
        \Log::info("جاري تشغيل الجهاز");
        // $telegramService->sendMessage("جاري تشغيل الجهاز");
        SendTelegramMessageJob::dispatch($this->chatIds, "جاري تشغيل الجهاز");

        // $telegramService->sendToAll("جاري تشغيل الجهاز");
    }
}

private function handleStopCommand($control, $telegramService): void
{
    if (!$control->button_state) {
        \Log::info("الجهاز لا يعمل بل فعل");
        $telegramService->sendMessage("الجهاز لا يعمل بل فعل");
    } else {
        $control->button_state = 0;
        $control->save();
        \Log::info("تم ايقاف الجهاز");
        // $telegramService->sendMessage("تم ايقاف الجهاز");
        // $telegramService->sendToAll("تم ايقاف الجهاز");
        SendTelegramMessageJob::dispatch($this->chatIds, "تم ايقاف الجهاز" );
    }
    }


private function registerUser($text, $chatId, $firstName): void
{
    $tele = telegram::where('number_test', $text)->first();
    if ($tele) {

        $tele->name = $firstName;
        $tele->id_user = $chatId;
        $tele->state = 1;
        $tele->save();
        $telegramService = new TelegramService($tele->id_user);
        $telegramService->sendMessage(" تم تسجيل دخولك بنجاح ");
        \Log::info("تم التسجيل: " . json_encode($tele));
    }
}


}