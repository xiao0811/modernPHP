<?php
/**
 * Created by PhpStorm.
 * User: 骁傻
 * Date: 2018-4-25
 * Time: 9:04
 */
class sampleClass{}

$myObject = new sampleClass();
if ($myObject instanceof sampleClass) {
    echo "\$myObject 是 sampleClass的实例.";
}
