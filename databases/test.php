<?php
/**
 * Created by PhpStorm.
 * User: 骁傻
 * Date: 2018-3-16
 * Time: 10:43
 */

require_once 'DB.php';
require_once 'function.php';
require_once 'redis.php';
require_once 'Xiao.php';
//
$data = require_once 'config.php';
//
//$db = new DB($data);
//$sql = "select * from overwatch";
//dd($db->pdoQueryArray($sql));
//echo "abc";

//Xiao::hello();
//$redis = new XiaoRedis();
//$redis->add('name', '骁傻');
//dd(getfirstchar('宝马'));

$sql = "SELECT * FROM `overwatch`";

//dd(DB::getInstance($data)::pdoQuery($sql));
