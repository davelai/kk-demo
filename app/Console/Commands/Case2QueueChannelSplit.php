<?php

namespace App\Console\Commands;

use App\Jobs\JobA;
use App\Jobs\JobB;
use App\Jobs\JobC;
use Illuminate\Console\Command;

class Case2QueueChannelSplit extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'case2';

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
// php artisan queue:work connectionA --queue=booking
// php artisan queue:work connectionB --queue=booking2

// 各個 connection 可以切換 sync, redis, db ...

        dispatch(new JobB(1))
            ->onConnection('connectionA')
            ->onQueue('booking');

        dispatch(new JobC(2))
            ->onConnection('connectionB')
            ->onQueue('booking2');
    }
}
