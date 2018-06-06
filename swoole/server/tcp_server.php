<?php
/**
 * Created by PhpStorm.
 * User: 骁傻
 * Date: 2018-6-6
 * Time: 9:33
 * 此文件不能在网页中使用, 只能用于command中
 */

// 创建Server对象, 监听127.0.0.1:9501端口
$server = new swoole_server("127.0.0.1", 9501);

// swoole 配置项
$server->set([
    'worker_num' => 8,          // worker进程数, cpu核数的 1-4倍
    'max_request' => 10000,     // 最大任务数
]);

/**
 * 监听连接进入事件
 * $fd 客户端连接的唯一标示, 自增???
 * $reactor_id 线程ID
 */
$server->on('connect', function ($server, $fd, $reactor_id) {
    echo "Client: {$reactor_id} - {$fd} -Content.\n";
});

// 监听数据接收事件

$server->on('receive', function ($server, $fd, $from_id, $data) {
    $server->send($fd, "Server: " . $data);
});

// 监听连接关闭事件
$server->on('close', function ($server, $fd) {
    echo "Client: Close.\n";
});

// 启动服务器
$server->start();
