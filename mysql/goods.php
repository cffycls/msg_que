<?php
/**
 * -- 配送系统 --
 * 定时发货
 */
include 'db.php';

$db = DB::getIntance();
//1. 中间态：锁定处理中数据
$waiting = ['status'=>0];
$lock = ['status'=>1];
$lock_res = $db->update('order_queue',$lock,$waiting,2); //每次刷新新处理2条

if ($lock_res){
    //2. 对这些处理中数据进行配货
    $res = $db->selectAll('order_queue',$lock);
    //省略配货代码

    //3. 修改订单状态为已完成
    $success = [
        'update_time' => date('Y-m-d H:i:s'),
        'status'=>2
    ];
    $res_last = $db->update("order_queue", $success,$lock);
    if($res_last){
        echo 'Success： '.$res_last;
    }else{
        echo 'Failed';
    }
}else{
    echo 'Nothing to do';
}

