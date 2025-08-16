<?php
namespace App\Events;

use App\Models\User;
use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class MyEvent implements ShouldBroadcast
{
  use Dispatchable, InteractsWithSockets, SerializesModels;

  public $message;

  public function __construct($message)
  {
      $this->message = $message;
      \Log::info('MyEvent initialized with message: ' . "aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa"); // إضافة تسجيل

  }

  public function broadcastOn()
  {
    // \Log::info('channel initialized with message: ' . User::where("id" , Auth::id())->first()->channel);
    //   return [User::where("id" , Auth::id())->first()->channel];
      return "channel104575277";
  }

  public function broadcastAs()
  {
      return 'my-event';
  }
}
