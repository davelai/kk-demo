# Queue driver

## Comparison

|        | Redis                                                                | Database     | RabbitMQ                                                                                                                                     |
|--------|----------------------------------------------------------------------|--------------|----------------------------------------------------------------------------------------------------------------------------------------------|
| 性能     | 最高（基於記憶體）                                                            | 中（基於磁碟）      | 高（專為訊息佇列設計）                                                                                                                                  |
| 持久性    | [可配置](https://tachingchen.com/tw/blog/redis-data-persistence/)（預設較低） | 高（磁碟儲存資料）    | 高（支援訊息持久化）                                                                                                                                   |
| 訊息特性   | 簡單的隊列                                                                | 簡單的隊列        | 支援多種訊息模式與路由                                                                                                                                  |
| 事務支援   | 不支援                                                                  | 支援           | [支持](https://medium.com/willhanchen/rabbitmq-%E5%A6%82%E4%BD%95%E4%BF%9D%E8%AD%89%E6%B6%88%E6%81%AF%E5%8F%AF%E9%9D%A0%E6%80%A7-398cb9d2836b) |

* Redis：適合快速處理大量任務和高並發場景，但需要考慮資料持久性和記憶體限制。
* 資料庫：適合任務量較小、對效能要求不高的場景，以及希望簡化部署和維護的情況。
* RabbitMQ：適合需要複雜的訊息提交和整合的場景，支援多種訊息模式和路由。
  * [RabbitMQ 簡介與 5 種設計模式](https://enzochang.com/rabbitmq-introduction/)

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

## RabbitMQ

### 負載均衡

[RabbitMQ集群配置与负载均衡详解](https://developer.baidu.com/article/details/2821799)

可以自動分配 consumer 負載

### RabbitMQ消息堆积问题

* [RabbitMQ，RocketMQ，Kafka，Pulsar 几种消息队列的对比](https://boilingfrog.github.io/2021/12/10/%E5%87%A0%E7%A7%8D%E5%B8%B8%E8%A7%81%E7%9A%84%E6%B6%88%E6%81%AF%E9%98%9F%E5%88%97%E7%9A%84%E5%AF%B9%E6%AF%94/)
  * `RabbitMQ 对消息堆积的处理不好，在它的设计理念里面，消息队列是一个管道，大量的消息积压是一种不正常的情况，应当尽量去避免。当大量消息积压的时候，会导致RabbitMQ的性能急剧下降；`
* [消息堆積解決方案](https://juejin.cn/post/7077205778465030181)

## TPS 每秒事務處理量 (Transactions per second)

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
