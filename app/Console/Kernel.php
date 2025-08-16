<?php

namespace App\Console;

use App\Models\User;
use App\Services\pross;
use Carbon\Carbon;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     */
    protected function schedule(Schedule $schedule): void
    {
        $schedule->call(function () {
            \Log::info('Background task running at 😊' . now());
            $pross = new pross();
            \Log::info($pross->get_data());
        })->everyMinute();
        $schedule->call(function () {
            $oneYearAgo = Carbon::now()->subYear()->startOfDay();
            $noActive = User::where('activeDate', '<', $oneYearAgo)->get();
            foreach ($noActive as $key => $value) {
                // $value->activeDate=Carbon::create(2024, 1, 2);
                $value->state = 3;
                $value->save();
                if ($value) {
                    \Log::info('schedule: ' . $value->state);
                }
            }
        })->everyMinute();
    }
    
    protected function commands(): void
    {
        $this->load(__DIR__ . '/Commands');

        require base_path('routes/console.php');
    }
}
