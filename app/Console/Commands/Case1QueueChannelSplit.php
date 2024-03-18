<?php

namespace App\Console\Commands;

use App\Jobs\JobA;
use App\Jobs\JobB;
use App\Jobs\JobC;
use Illuminate\Console\Command;

class Case1QueueChannelSplit extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'case1';

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
// queue.php
// sail artisan queue:work connectionA
// sail artisan queue:work connectionB

// 各個 connection 可以切換 sync, redis, db ...

        dispatch(new JobB(1))
            ->onConnection('connectionA');

        dispatch(new JobC(2))
            ->onConnection('connectionB');
    }
}
