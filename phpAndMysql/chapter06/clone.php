<?php
/**
 * Created by PhpStorm.
 * User: 骁傻
 * Date: 2018-5-8
 * Time: 9:48
 */

class A
{
    public $name;

    public function __clone()
    {
        // TODO: Implement __clone() method.
    }
}

$a = new A();

$a->name = "xiaozang";

$b = clone $a;
echo $b->name . "<br>";     // xiaozang