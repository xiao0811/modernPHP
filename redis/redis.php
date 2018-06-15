<?php
/**
 * Created by PhpStorm.
 * User: 骁傻
 * Date: 2018-6-15
 * Time: 17:25
 */

require_once "../common/function.php";
$redis = new Redis();
$redis->connect('127.0.0.1');
$info = $redis->info();

//dd($info);  // Redis 信息

dd($redis->get('name'));
$redis->set('name', '骁傻');
dd($redis->get('name'));

$name = [
    'xiaosha',
    'xiaozang',
    'xiaoxiong',
    'xiaoyao'
];

if ($redis->hMset('NAME', $name)) {
    echo "OK";
}

dd($redis->hGetAll('NAME'));
dd($redis->hVals('NAME'));