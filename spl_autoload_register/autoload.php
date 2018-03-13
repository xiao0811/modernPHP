<?php
/**
 * Created by PhpStorm.
 * User: 骁傻
 * Date: 2018-3-13
 * Time: 15:43
 */
spl_autoload_register(function ($class) {
    $fileName = $class . ".php";
    if (file_exists($fileName)) {
        require_once $fileName;
//        echo $fileName;
    }
//    echo $fileName;
});

$os = new Xiao();