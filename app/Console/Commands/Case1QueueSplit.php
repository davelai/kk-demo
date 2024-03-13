<?php

namespace App\Console\Commands;

use App\Jobs\JobA;
use App\Jobs\JobB;
use App\Jobs\JobC;
use Illuminate\Console\Command;

class Case1QueueSplit extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'Case1QueueSplit';

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
        dispatch(new JobB(1))
            ->onQueue('booking');

        dispatch(new JobC(2))
            ->onQueue('booking2');
    }
}
