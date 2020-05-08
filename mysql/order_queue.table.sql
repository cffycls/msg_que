-- 订单队列表
CREATE TABLE if not exists `order_queue` (
`id` int(11) unsigned not null auto_increment comment 'id',
`order_id` varchar(20) not null comment '订单号',
`mobile` varchar(20) not null comment '手机号',
-- `address` varchar(100) not null default '--' comment '送货地址',
`create_time` datetime not null default '2000-01-01 00:00:00' comment '订单创建时间',
`update_time` datetime not null default '2000-01-01 00:00:00' comment '订单处理完成时间',
`status` tinyint(2)  not null comment '当前状态： 0未处理，1处理中，2已处理',
primary key (`id`)
) ENGINE=InnoDB default charset=utf8;
