<?php
/**
 * Created by PhpStorm.
 * User: 骁傻
 * Date: 2018-3-13
 * Time: 15:21
 */


function __autoload($class)
{
    $file = $class . '.php';

    if (file_exists($file)) {
        include_once $file;
    } else {
        echo "找不到$class.php文件";
    }
}

$xiao = new Xiaosha();