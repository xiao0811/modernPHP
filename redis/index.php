<?php
/**
 * Created by PhpStorm.
 * User: panxiao
 * Date: 2018/4/21
 * Time: 下午1:06
 */

//$redis = new Redis();
//$redis->connect("127.0.0.1");

$pdo = new PDO('mysql:host=localhost;dbname=laravel', 'root', 'root');
//$sql = "SELECT * FROM `users`";

$res = $pdo->query($sql);

//while ($row = $res->fetch(PDO::FETCH_ASSOC)) {
//    echo $row['username'] . "<br>";
//}
$data = [
    'name' => "xiaosha",
    'age'  => 25,
    'sex'  => 'boy'
];
//$redis->set('less', json_encode($data));
$data_json = serialize($data);
//$data_json = "xiaosha";
//var_dump($data_json);die();
$sql = "INSERT INTO `xiaosha` (connect) VALUE ( '" .  $data_json . "')";
echo $sql;

if ($pdo->query($sql)) {
    echo "success";
} else {
    echo "error";
}