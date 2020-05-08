-- 秒杀队列表
CREATE TABLE if not exists `redis_queue` (
 `id` int(11) unsigned not null auto_increment comment 'id',
 `uid` int(11) unsigned not null comment '用户id',
 `rtime` datetime not null default '2000-01-01 00:00:00' comment '--创建时间',
 `req_time` varchar(24)  not null comment '时间戳字符串',
 primary key (`id`)
) ENGINE=InnoDB default charset=utf8;
