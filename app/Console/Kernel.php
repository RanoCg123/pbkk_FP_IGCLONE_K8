<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Support\Facades\Cache;
use App\Models\post;
class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     */
    protected function schedule(Schedule $schedule): void
    {
        $schedule->call(function () {
            // Logic to fetch random posts
            $randomPosts = post::inRandomOrder()->limit(10)->get();
    
            // Cache the random posts
            Cache::put('random_posts', $randomPosts);
    
            // Log success message
            \Illuminate\Support\Facades\Log::info('Random posts fetched and cached successfully.');
        })->everyMinute();
    }

    /**
     * Register the commands for the application.
     */
    protected function commands(): void
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
