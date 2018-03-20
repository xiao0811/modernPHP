<?php
/**
 * Created by PhpStorm.
 * User: 骁傻
 * Date: 2018-3-20
 * Time: 13:47
 */

// 请求的网页地址,初始化
$ch = curl_init("http://php.net");
// 发送网页请求
curl_exec($ch);
// 关闭资源
curl_close($ch);