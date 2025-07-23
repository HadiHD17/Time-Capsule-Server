<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Capsule;
use Carbon\Carbon;

class ActivateCapsules extends Command
{
    // Command signature & description
    protected $signature = 'capsules:activate';
    protected $description = 'Activate capsules whose reveal_date has passed';

    public function handle()
    {
        $now = Carbon::now();

        $activatedCount = Capsule::where('is_activated', false)
            ->where('reveal_date', '<=', $now)
            ->update(['is_activated' => true]);

        $this->info("Activated {$activatedCount} capsules.");
    }
}
