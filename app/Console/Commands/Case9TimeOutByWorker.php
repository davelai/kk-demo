<?php

namespace App\Console\Commands;

use App\Jobs\JobA;
use App\Jobs\JobB;
use App\Jobs\JobC;
use App\Jobs\JobD;
use App\Jobs\JobE;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Str;

class Case9TimeOutByWorker extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'case9';

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
//      sail artisan  queue:work connectionCTimeOut --timeout=10
//      sail artisan  queue:work connectionCTimeOut 不給的話預設60秒 timeout

//      如果想要無限時呢
//      sail artisan  queue:work connectionCTimeOut --timeout=0
        dispatch(new JobE(Str::uuid()))
            ->onConnection('connectionCTimeOut');
    }
}
