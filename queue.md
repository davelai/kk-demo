# Queue driver

## Comparison

|        | Redis                                                                | Database     | RabbitMQ                                                                                                                                     |
|--------|----------------------------------------------------------------------|--------------|----------------------------------------------------------------------------------------------------------------------------------------------|
| 性能     | 最高（基於記憶體）                                                            | 中（基於磁碟）      | 高（專為訊息佇列設計）                                                                                                                                  |
| 持久性    | [可配置](https://tachingchen.com/tw/blog/redis-data-persistence/)（預設較低） | 高（磁碟儲存資料）    | 高（支援訊息持久化）                                                                                                                                   |
| 訊息特性   | ˙簡單的隊列                                                               | 簡單的隊列        | 支援多種訊息模式與路由                                                                                                                                  |
| 事務支援   | 不支援                                                                  | 支援           | [支持](https://medium.com/willhanchen/rabbitmq-%E5%A6%82%E4%BD%95%E4%BF%9D%E8%AD%89%E6%B6%88%E6%81%AF%E5%8F%AF%E9%9D%A0%E6%80%A7-398cb9d2836b) |

* Redis：適合快速處理大量任務和高並發場景，但需要考慮資料持久性和記憶體限制。
  * [laravel horizon](https://laravel.com/docs/10.x/horizon#installation) - Redis 隊列的監控工具 
* 資料庫：適合較需要保證資料不會 loss 的場景
* RabbitMQ：適合需要複雜的訊息提交和整合的場景，支援多種訊息模式和路由。
  * [RabbitMQ 簡介與 5 種設計模式](https://enzochang.com/rabbitmq-introduction/)

## RabbitMQ

### vhost

安裝後要設定的東西，

`RABBITMQ_VHOST=my_vhost`

> Vhost 是 RabbitMQ 中的一個隔離層，它提供了一組獨立的環境，包括隊列、交換器、綁定等。

```shell
rabbitmqctl add_vhost my_vhost
rabbitmqctl set_permissions -p my_vhost root ".*" ".*" ".*"
```

### 消息可靠性 (同時必須有持久性)

https://segmentfault.com/a/1190000023736395

worker 從 db / redis queue 拿出資料之後, 

如果 worker 掛掉, 資料就會消失, 

沒辦法保證 consume,

而 rabbit mq 可利用 [消息確認（Message Acknowledgment）](https://www.cnblogs.com/bigberg/p/8137068.html) 機制


> abbitMQ收到消息回执（Message acknowledgment）后才将该消息从Queue中移除；如果RabbitMQ没有收到回执并检测到消费者的RabbitMQ连接断开，则RabbitMQ会将该消息发送给其他消费者（如果存在多个消费者）进行处理。

### 負載均衡

[RabbitMQ集群配置与负载均衡详解](https://developer.baidu.com/article/details/2821799)

可以自動分配 consumer 負載

### RabbitMQ消息堆积问题

* [RabbitMQ，RocketMQ，Kafka，Pulsar 几种消息队列的对比](https://boilingfrog.github.io/2021/12/10/%E5%87%A0%E7%A7%8D%E5%B8%B8%E8%A7%81%E7%9A%84%E6%B6%88%E6%81%AF%E9%98%9F%E5%88%97%E7%9A%84%E5%AF%B9%E6%AF%94/)
  * `RabbitMQ 对消息堆积的处理不好，在它的设计理念里面，消息队列是一个管道，大量的消息积压是一种不正常的情况，应当尽量去避免。当大量消息积压的时候，会导致RabbitMQ的性能急剧下降；`
* [消息堆積解決方案](https://juejin.cn/post/7077205778465030181)

## TPS vs Other MQ

每秒事務處理量 (Transactions per second)

* RabbitMQ: 十萬
* Kafka: 百萬
* RocketMQ: 十萬
* ActiveMQ: 一萬


## Other

* [(dead lock) datebase 作为队列引擎时，会开启一个事务同时加上排它锁](https://learnku.com/laravel/t/46331)
* [RabbitMQ ve Redis (AWS)](https://aws.amazon.com/tw/compare/the-difference-between-rabbitmq-and-redis/)
* [RabbitMQ vs Redis](https://medium.com/@contact_45426/redis-vs-rabbitmq-a-detailed-comparison-998ed1ba7fc2)
  ![](https://miro.medium.com/v2/resize:fit:720/format:webp/1*DY5PPZ4KN9tX_1JaLFKfSg.png)
* [rabbitMQ、activeMQ、zeroMQ、Kafka、Redis 比较](https://developer.aliyun.com/article/590415)

# Laravel Queue 用法

## case 1: worker by connection

可以根據 connection 來分不同的 worker,

並且不同 connection 可以用不同的 driver,

可以切換 sync, redis, db ...

```php
dispatch(new JobB(1))
    ->onConnection('connectionA')
    ->onQueue('booking');
```

## case 2. redis queue
## case 3. rabbit mq

`sail artisan queue:work --queue=booking2,booking`

## case 4: worker by queue

可以根據 queue 來分不同 worker, 但是 driver 都是用同一個

```php
dispatch(new JobB(1))
            ->onQueue('booking');
```


## case 5. 優先度

queue 放前面的會先跑


## case 6: batch job

無順序性要求, 

可以將任務切分成多個 job,

給多個 worker 同時執行,

`select * from job_batches;`

查看 batch 分發的 job 狀態

```php
Bus::batch([
    new JobA(1),
    new JobA(2),
    new JobA(3),
])
```

## case 7. chain job

有順序性要求, 且失敗會中斷

```php
Bus::chain([
    new JobB('c 1'),
    new JobB('c 2'),
    new JobB('c 3'),
])->dispatch();
```

## case 8. job timeout

可以設定 job 的 timeout， 

避免 job 執行時間過長

例如供應商 API 連線過久

```php
    // 超過 3 秒後 fail
    public int $timeout = 3;
```

## case 9. worker timeout

要注意如果 job 沒設置 timeout,

artisan command 預設 60 秒 timeout

```shell
//      sail artisan  queue:work connectionCTimeOut --timeout=10
//      sail artisan  queue:work connectionCTimeOut 不給的話預設60秒 timeout
```


## case 10. docker exit

[source](https://laracasts.com/discuss/channels/servers/gracefully-stop-the-queue-worker-in-docker)

主要的 docker init command 會接受 signal,

`command: sh -c "php artisan queue:work --timeout=0"`

等待執行結束才關掉 container

但是太久的話還是會被強制結束


## Transaction

DB queue 要注意如果是同個 connection 會一起進 transaction (commit 之後才會進 table),
如果是 redis 就不會

```php
public function handle()
{
    DB::beginTransaction();
    dispatch(new JobB(1))
    ->onConnection('redis');

//        dispatch(new JobC(2));

    sleep(100);
    DB::commit();
}
```

# Queue 的紀錄

是否需要有 queue dispatch 的紀錄

* 自製 
  * helper dispatch 後寫入 Elastic
  * worker artisan command 處理完 Queue 後寫入 Elastic
* Job event: `::before`, `::after`
  * fail job event

# 任務重啟與失敗

Jenkins 的重啟與 Queue 本身的失敗重啟

該如何處理, 是否需要重啟

重啟的話只要加上 retry

但有些操作是不能重做的

解決方案: [YanoljaV2](https://github.com/kkday-it/kkday-b2b-api/pull/3304)

裡面 kay 有設計 pipeline

如果沒個 pipeline 在沒有成功前都可以重做

就可以考慮在 pipeline 改成 chain queue

在終端後能從上次的 pipeline 繼續執行
