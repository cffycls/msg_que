<?php
include dirname(__DIR__).'/mysql/db.php';

$redis = new Redis();
$redis->connect("172.1.13.11",6379);
$redis_name = 'miao_sha';
$db = DB::getIntance();

while(1){
    sleep(2);
    $user = $redis->lPop($redis_name);
    if(!$user || $user=='nil'){ //此处判断
        continue;
    }else{
        $user_arr = explode('%', $user);
        $insert_data = [
            'uid' => $user_arr[0],
            'rtime' => date('Y-m-d H:i:s'),
            'req_time' => $user_arr[1]
        ];
        echo '-';
        $res = $db->insert('redis_queue',$insert_data);
        if(!$res){
            $redis->rPush($redis_name, $user);
        }
    }
}

$redis->close();