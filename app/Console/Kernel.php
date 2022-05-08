<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Support\Facades\DB;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        'App\Console\Commands\RegisteredUsers',
    ];


    /**
     * Get the timezone that should be used by default for scheduled events.
     *
     * @return \DateTimeZone|string|null
     */
    protected function scheduleTimezone()
    {
        return 'Asia/Jakarta';
    }

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // basic inspire command (runs every minute with appending output to log)
        $schedule->command('inspire')
            ->everyMinute()
            ->appendOutputTo(storage_path('logs/inspire.log'));
        
        // basic scheduling by calling a function 
        $schedule->call(function () {
            DB::table('books')->delete();
        })->dailyAt('20:17');

        // command scheduling 
        $schedule->command('registered:users')
            ->everyFiveMinutes();
            // ->hourly()
            // ->between('8:00', '17:00');
            
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__ . '/Commands');

        require base_path('routes/console.php');
    }
}
