<?php
/**
 * Created by PhpStorm.
 * User: panxiao
 * Date: 2018/4/16
 * Time: 上午12:55
 * so 彩票不能买
 */
/**
 * @param $money
 * @param $multiple
 * @return float|int
 */
function buy($money, $multiple)
{
    $num = rand(0, 9);
    if ($num == 9 || $num == 8) {
        $money -= 8 * $multiple;
    } else {
        $money += $multiple * 9.9 - 80;
    }
    echo $num . "<br>";
    return $money;
}

$money =1000;
for ($i=0; $i <100; $i++) {
    $money = buy($money, 10);
    echo $i . '===' . $money . "<br>";
    if ($money < 0) {
        break;
    }
}
