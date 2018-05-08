<?php
/**
 * Created by PhpStorm.
 * 生成器--yield
 * User: 骁傻
 * Date: 2018-5-8
 * Time: 12:37
 */

function fizzbuzz($start, $end)
{
    $current = $start;
    while ($current <= $end) {
        if ($current % 3 == 0 && $current % 5 == 0) {
            yield "fizzbuzz";
        } elseif ($current % 3 == 0) {
            yield "fizz";
        } elseif ($current % 5 == 0) {
            yield "buzz";
        } else {
            yield $current;
        }

        $current++;
    }
}

/**
 * 1
 * 2
 * fizz
 * 4
 * buzz
 * fizz
 * 7
 * 8
 * fizz
 * buzz
 */
foreach (fizzbuzz(1, 10) as $number) {
    echo "$number<br>";
}
