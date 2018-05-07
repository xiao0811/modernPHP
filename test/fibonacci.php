<?php
/**
 * Created by PhpStorm.
 * User: 骁傻
 * Date: 2018-4-28
 * Time: 10:21
 */


function Fibonacci($num1, $num2, $max = 10000)
{
    list($num1, $num2) = [$num2, $num1 + $num2];
    echo $num1 . "<br>";
    if ($num2 < $max) {
        Fibonacci($num1, $num2, $max);
    }
}

Fibonacci(1, 1, 100000000);
