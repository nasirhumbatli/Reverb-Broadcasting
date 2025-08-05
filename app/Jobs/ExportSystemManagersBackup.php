<?php

namespace App\Jobs;

use App\Events\ManagersBackupExportedEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use App\Models\User;

class ExportSystemManagersBackup implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    public function __construct(public int $userId, public string $userName)
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        sleep(5); // I wrote this to simulate Export Backup process.

        broadcast(new ManagersBackupExportedEvent($this->userId, $this->userName));
    }
}
