<?php
/**
 * Created by PhpStorm.
 * User: 骁傻
 * Date: 2018-6-12
 * Time: 10:19
 */

require_once "../common/function.php";

$redis = new Redis();
$redis->connect('127.0.0.1');

$xiaosha = [
    'name' => 'xiaosha',
    'age' => 20,
    'gender' => 'male'
];

$xiaoyao = [
    'name' => 'xiaoyao',
    'age' => 22,
    'gender' => 'female'
];

$xiaozang = [
    'name' => 'xiaozang',
    'age' => 25,
    'gender' => 'male'
];

// 数组不能储存!!!
//if ($redis->lPush('xiao', $xiaosha, $xiaoyao, $xiaozang)) {
//    echo "OK";
//}

$redis->lpush("xiao", 'panxiao', 'xiaosha');

$result = $redis->lRange('xiao', 0, -1);

dd($result);