<?php

namespace App\Console\Commands;

use App\Jobs\JobA;
use App\Jobs\JobB;
use App\Jobs\JobC;
use App\Jobs\JobF;
use Illuminate\Console\Command;

class Case10ExitSignal extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'case10';

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
//        sail artisan queue:work --timeout=0
//        command from docker-compose
//        docker stop

        dispatch(new JobF(1));
    }
}
