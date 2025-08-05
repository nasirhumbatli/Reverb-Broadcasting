<?php

namespace App\Console\Commands;

use App\Events\MaintenanceModeEvent;
use Illuminate\Console\Command;

class NotifyUsersForMaintenanceByCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'notify:maintenance';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        $date = $this->ask('What is Maintenance start date?');

        broadcast(new MaintenanceModeEvent($date));
    }
}
