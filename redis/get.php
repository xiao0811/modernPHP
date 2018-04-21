<?php
/**
 * Created by PhpStorm.
 * User: panxiao
 * Date: 2018/4/21
 * Time: 下午1:09
 */

//$redis = new Redis();
//$redis->connect("127.0.0.1");
//
////echo "<pre>";
////var_dump(json_decode($redis->get('less')));
////echo "</pre>";
//
//echo $redis->get('less');

$pdo = new PDO('mysql:host=localhost;dbname=laravel', 'root', 'root');
$sql = "SELECT * FROM `xiaosha` WHERE `id` = 6";
$res = $pdo->query($sql);

while ($row = $res->fetch(PDO::FETCH_ASSOC)) {
    echo "<pre>";
    var_dump($row);
    echo "</pre>";
}
