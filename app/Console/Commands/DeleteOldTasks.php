<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class DeleteOldTasks extends Command
{
    protected $signature = 'tasks:cleanup';
    protected $description = 'Delete tasks older than 30 days';
    
    public function handle()
    {
        $deleted = Task::where('created_at', '<', now()->subDays(30))->delete();
        Log::info("Deleted $deleted tasks older than 30 days.");
        $this->info("Deleted $deleted tasks.");
    }
}
