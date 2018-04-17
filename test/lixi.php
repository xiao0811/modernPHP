<?php
/**
 * Created by PhpStorm.
 * User: 骁傻
 * Date: 2018-4-16
 * Time: 9:21
 */

$buy_time = strtotime('2017-10-16');
$end_time = strtotime("2018-04-12");
echo ($end_time - $buy_time) / 86400;
