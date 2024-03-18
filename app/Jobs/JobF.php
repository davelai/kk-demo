<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class JobF implements ShouldQueue
{
    use InteractsWithQueue, Queueable, SerializesModels;

    public int $tries = 10;

    private mixed $name;

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
        Log::info('JobF, name: ' . $this->name);
        for ($i = 0; $i < 5000; $i++) {
            $text = $i . '-JobF(' . $this->name . ')';
            echo $text . PHP_EOL;
            Log::info($text);
            sleep(1);
        }
    }
}
