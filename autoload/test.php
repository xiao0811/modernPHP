<?php
/**
 * Created by PhpStorm.
 * User: 骁傻
 * Date: 2018-3-13
 * Time: 14:07
 */

spl_autoload_extensions(function ($class) {
    echo "Want to load {$class} .";
    throw new Exception("Unable to load $class.");
});

try {
    $obj = new NonLoadableClass();
} catch (Exception $e) {
    echo $e->getMessage();
}