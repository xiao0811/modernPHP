<?php
/**
 * Created by PhpStorm.
 * User: panxiao
 * Date: 2018/3/21
 * Time: 下午11:26
 */

$redis = new Redis();
$redis->connect('127.0.0.1');

$redis->hMset('xiaosha', [
    'name' => 'xiaosha',
    'age' => 30,
    'abc' => 'bcd'
]);

var_dump($redis->hGet('xiaosha', 'abc'));