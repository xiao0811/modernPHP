<?php
/**
 * Created by PhpStorm.
 * User: panxiao
 * Date: 2018/3/21
 * Time: 下午11:26
 */

$redis = new Redis();
$redis->connect('127.0.0.1');
define("USERS_INFO", "USERS");

$redis->hMset(USERS_INFO, [
    'name' => 'xiaosha',
    'age' => 30,
    'abc' => 'bcd'
]);

//$redis->hMset(USERS_INFO, [
//    'name' => 'xiaoge',
//    'age' => 20,
//    'abc' => "xiaosha"
//]);

var_dump($redis->hGet(USERS_INFO, 'abc'));