<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class Case2CustomRule extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:test-command';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        //        改 pint.json
        //        sail pint --test app/Console/Commands/Case2CustomRule.php
        //

        $a = [];
        array_push($a, 1);
    }
}
