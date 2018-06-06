<?php
/**
 * Created by PhpStorm.
 * User: 骁傻
 * Date: 2018-6-6
 * Time: 10:59
 */

$client = new swoole_client(SWOOLE_SOCK_UDP);

if (!$client->connect("127.0.0.1", 9502, 1, 1)) {
    echo "error";
    exit();
}

$msg = "nibaba";
// 发送消息给 udp_server服务器
if (!$client->send($msg)) {
    echo "发送error";
}

// 接收来自server 的数据
$result = $client->recv();
echo $result . "\n";