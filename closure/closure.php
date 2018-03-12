<?php
/**
 * 闭包/匿名函数
 * Created by PhpStorm.
 * User: panxiao
 * Date: 2018/3/12
 * Time: 下午11:23
 */

$closure = function ($name) {
    return "Hello " . $name . "\n";
};

echo $closure("xiaosha");