<?php

namespace App\Console\Commands;

use App\Jobs\JobA;
use App\Jobs\JobB;
use App\Jobs\JobC;
use App\Jobs\JobD;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Str;

class Case8TimeOutByQueue extends Command
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
//        sail artisan queue:work connectionCTimeOut
        // retry 的秒數是根據： 'retry_after' => 20,

        dispatch(new JobD(Str::uuid()))
            ->onConnection('connectionCTimeOut');

//        sail artisan  queue:work connectionCTimeOut --timeout=10
    }
}
