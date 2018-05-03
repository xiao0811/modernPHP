<?php
/**
 * Created by PhpStorm.
 * User: panxiao
 * Date: 2018/5/3
 * Time: 下午1:15
 */

$arr = [];
for ($i = 0; $i < 1000; $i++) {
    $arr[] = rand(100000, 999999);
}

echo "<pre>";
print_r($arr);
echo "</pre>";


function xiaoSort($arr)
{
    $len = count($arr);
    for ($i = 1; $i < $len; $i++) {
        for ($j = 0; $j < $len - $i; $j++) {
            if ($arr[$j] > $arr [$j + 1]) {
//                $tmp = $arr[$j + 1];
//                $arr[$j + 1] = $arr[$j];
//                $arr[$j] = $tmp;
                list($arr[$j], $arr[$j + 1]) = [$arr[$j + 1], $arr[$j]];
            }
        }
    }

    return $arr;
}

echo "<pre>";
print_r(xiaoSort($arr));
echo "</pre>";

$arr = array(1, 43, 54, 62, 21, 66, 32, 78, 36, 76, 39);
function getpao($arr)
{
    $len = count($arr);
    //设置一个空数组 用来接收冒出来的泡
    //该层循环控制 需要冒泡的轮数
    for ($i = 1; $i < $len; $i++) { //该层循环用来控制每轮 冒出一个数 需要比较的次数
        for ($k = 0; $k < $len - $i; $k++) {
            if ($arr[$k] > $arr[$k + 1]) {
                $tmp = $arr[$k + 1];
                $arr[$k + 1] = $arr[$k];
                $arr[$k] = $tmp;
            }
        }
    }
    return $arr;
}

var_dump(getpao($arr));