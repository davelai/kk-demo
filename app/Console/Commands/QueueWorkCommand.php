<?php
//
//namespace App\Console\Commands;
//
//use Illuminate\Contracts\Cache\Repository as Cache;
//use Illuminate\Queue\Console\WorkCommand;
//use Illuminate\Queue\Worker;
//use Symfony\Component\Console\Command\SignalableCommandInterface;
//
//class QueueWorkCommand extends WorkCommand implements SignalableCommandInterface
//{
//
//    public function getSubscribedSignals(): array
//    {
//        return [SIGTERM];
//    }
//
//    public function handleSignal(int $signal): void
//    {
//        if (SIGTERM === $signal) {
//            $this->call('queue:restart');
//        }
//    }
//}
