<?php
$redis = new Redis();
$redis->connect("127.0.0.1",6379);
$redis_name = 'miao_sha';

echo '秒杀...';
for ($i=0; $i<100; $i++) {
    $uid = rand(100000,999999);
    //$uid = $_GET['uid'];

    $num = 10;
    if ($redis->lLen($redis_name) < $num) {
        $redis->rPush($redis_name, $uid . '%' . microtime());
        echo '秒杀成功' . $uid;
    } else {
        echo '秒杀已结束.';
    }
}
$redis->close();
echo '秒杀结束<hr/>'.$redis->lLen($redis_name);