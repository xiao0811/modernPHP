<?php
/**
 * Created by PhpStorm.
 * User: 骁傻
 * Date: 2018-6-6
 * Time: 10:50
 */

// 创建Server对象, 监听127.0.0.1:9502端口, 类型为SWOOLE_SOCK_UDP
$server = new swoole_server("127.0.0.1", 9502, SWOOLE_PROCESS, SWOOLE_SOCK_UDP);

// 监听数据接收事件
$server->on("Packet", function ($server, $data, $clientInfo) {
    $server->sendto($clientInfo['address'], $clientInfo['port'], "Server " . $data);
    var_dump($clientInfo);
});

$server->start();
