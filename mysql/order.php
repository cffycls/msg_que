<?php
/**
 * -- 订单系统 --
 * 接收订单
 */
include 'db.php';

if (!empty($_GET['mobile'])){
    //数据验证略
    //订单处理
    //。。。
    $order_id = date("YmdHis"). '-'. rand(1000,9999);

    //生成的订单信息
    $insert_data = [
        'order_id' => $order_id,
        'mobile' => $_GET['mobile'],
        'create_time' => date('Y-m-d H:i:s'),
        'status' => 0
    ];
    //把订单信息保存到订单表中
    $db = DB::getIntance();
    $res = $db->insert("order_queue", $insert_data);
    if($res){
        echo '保存成功： '.$insert_data['order_id'];
    }else{
        echo '保存失败';
    }

}