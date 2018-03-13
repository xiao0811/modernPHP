<?php
/**
 * Created by PhpStorm.
 * User: 骁傻
 * Date: 2018-3-13
 * Time: 15:54
 */
//use Os\Linux;
spl_autoload_register(function ($class) {
//    $class_map = [
//        'os\Linux' => './Linux.php'
//    ];
//
//    $file = $class_map[$class];
    $class = str_replace('\\', '/', $class);
    $file = "../$class.php";
    echo $file;

    if (file_exists($file)) {
        require_once $file;
        echo "has";
    }
});

new \Os\Linux();