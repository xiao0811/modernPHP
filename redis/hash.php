<?php
/**
 * Created by PhpStorm.
 * User: 骁傻
 * Date: 2018-6-12
 * Time: 10:15
 */
require_once "../common/function.php";
$redis = new Redis();
$redis->connect('127.0.0.1');

$result = $redis->hGetAll('xiaosha');

dd($result);