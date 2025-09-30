<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Jobs\UpdateDashboardStatsJob;

class UpdateDashboardStatsCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'dashboard:refresh-stats';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Refresh dashboard statistics and cache them.';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        UpdateDashboardStatsJob::dispatch();

        $this->info('Dashboard stats update job dispatched successfully.');
    }
}
