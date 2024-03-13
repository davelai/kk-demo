<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class JobD implements ShouldQueue
{
    use InteractsWithQueue, Queueable, SerializesModels;

    private mixed $name;

    // 超過 3 秒後 fail
    public int $timeout = 3;

//    select * from failed_jobs order by id desc;
// 執行 3 次後進 failed job
    public int $tries = 3;

    /**
     * Create a new job instance.
     */
    public function __construct($name)
    {
        $this->name = $name;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        Log::info('JobD, name: ' . $this->name);
        for ($i = 0; $i < 5000; $i++) {
            $text = $i . '-JobD(' . $this->name . ')';
            echo $text . PHP_EOL;
            Log::info($text);
            sleep(1);
        }
    }
}
