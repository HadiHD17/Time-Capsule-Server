<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    // Register your command here
    protected $commands = [
        \App\Console\Commands\ActivateCapsules::class,
    ];

    protected function schedule(Schedule $schedule)
    {
        $schedule->command('capsules:activate')->everyMinute();
    }

    protected function commands()
    {
        $this->load(__DIR__ . '/Commands');

        require base_path('routes/console.php');
    }
}
