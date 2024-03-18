<?php

namespace App\Console\Commands;

use App\Jobs\JobA;
use App\Jobs\JobB;
use App\Jobs\JobC;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Bus;

class Case7OrderedChain extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'case4';

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
//        sail artisan queue:work
        Bus::chain([
            new JobB('c 1'),
            new JobB('c 2'),
            new JobB('c 3'),
        ])->dispatch();

//        如果是這樣, 開2個 worker, 就不會按照順序
//        dispatch(new JobB('c 1'));
//        dispatch(new JobB('c 2'));
//        dispatch(new JobB('c 3'));

    }
}
