<?php
/**
 * Created by PhpStorm.
 * User: 骁傻
 * Date: 2018-6-6
 * Time: 11:57
 */

$http = new swoole_http_server("0.0.0.0", 8080);
$http->set([
    'enable_static_handler' => true,
    'document_root' => "/home/xiaosha/Desktop/code/modernPHP/swoole/views",
]);
$http->on('request', function ($request, $response) {
    $data['post'] = $request->post;
    $data['get'] = $request->get;
    $response->end(json_encode($data));
//    $response->end("<h1>xiaosha</h1>");
});

$http->start();