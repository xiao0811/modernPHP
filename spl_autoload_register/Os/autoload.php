<?php
/**
 * Created by PhpStorm.
 * User: 骁傻
 * Date: 2018-3-13
 * Time: 15:54
 */

spl_autoload_register(function ($class) {
    $class_map = [
        'os\Linux' => './Linux.php'
    ];

    $file =$class_map[$class];
//    echo $file;
    
    if (file_exists($file)) {
        require_once $file;
    }
});

new \os\Linux();