<?php
/**
 * Created by PhpStorm.
 * User: 骁傻
 * Date: 2018-5-8
 * Time: 13:59
 */

try {
    throw new Exception("A terrible error has occurred.", 52);
} catch (Exception $exception) {
//    echo "Exception " . $exception->getCode() . ":" . $exception->getMessage() .
//    "<br>" . " in " . $exception->getFile() . " on line " . $exception->getLine() . "<br>";
    echo $exception;
}