<?php
/**
 * Created by PhpStorm.
 * User: 骁傻
 * Date: 2018-6-6
 * Time: 10:15
 */

// 连接 swoole tcp 服务

$client = new swoole_client(SWOOLE_SOCK_TCP);
if (!$client->connect("127.0.0.1", 9501)) {
    echo "error";
    exit();
}

// php cli 常量
//fwrite(STDOUT, "请输入消息:");
//$msg = trim(fgets(STDIN));


$msg = "xiaosha";
// 发送消息给 tcp_server服务器
if (!$client->send($msg)) {
    echo "发送error";
}

// 接收来自server 的数据
$result = $client->recv();
echo $result . "\n";