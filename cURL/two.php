<?php
/**
 * Created by PhpStorm.
 * User: 骁傻
 * Date: 2018-3-20
 * Time: 13:53
 */
// 初始化
$ch = curl_init();
// 设置访问网页地址
curl_setopt($ch, CURLOPT_URL, 'http://php.net');
// 执行之后不直接打印
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

$data = curl_exec($ch);
curl_close($ch);


echo $data;