<?php

namespace App\Console\Commands;

use App\Jobs\JobA;
use App\Jobs\JobB;
use App\Jobs\JobC;
use Illuminate\Console\Command;

class Case2RedisJobsCheck extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'case7';

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
//        sail artisan queue:work redis

// redis-cli
// keys *
// lrange laravel_database_queues:default 0 -1

        dispatch(new JobB(1))
            ->onConnection('redis');

        dispatch(new JobC(2))
            ->onConnection('redis');
    }
}
