<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class Case1Normal extends Command
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
    public function handle()
    {
//        sail pint --test 所有檔案
//        sail pint --test app/Console/Commands/Case1Normal.php 不會修正
//        sail pint app/Console/Commands/Case1Normal.php 自動修正
//
    }

    public function testA()
      {

    }
}
