<?php
/**
 * Created by PhpStorm.
 * User: panxiao
 * Date: 2018/4/15
 * Time: 上午1:59
 */

$arr = [];

function getNum($arr)
{
    $num = rand(0, 500);
    if (in_array($num, $arr)) {
        getNum($arr);
        return $arr;
    } else {
        echo $num . "<br>";
        $arr[] = $num;
        return $arr;
        echo "<pre>";
        var_dump($arr);
        echo "</pre>";
    }
}

for ($i = 0; $i < 30; $i++) {
    $arr = getNum($arr);
    echo "<pre>";
    var_dump($arr);
    echo "</pre>";
}
