<?php

namespace App\Console\Commands;

use App\Jobs\JobA;
use App\Jobs\JobB;
use App\Jobs\JobC;
use Illuminate\Console\Command;

class Case5QueuePrior extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'case8';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
//      sail artisan queue:work --queue=booking2,booking
//      job c 先跑

        dispatch(new JobB(1))
            ->onQueue('booking');

        dispatch(new JobC(2))
            ->onQueue('booking2');
    }
}
