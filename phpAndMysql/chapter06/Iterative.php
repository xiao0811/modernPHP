<?php
/**
 * Created by PhpStorm.
 * User: 骁傻
 * Date: 2018-5-8
 * Time: 10:53
 */

class myClass_1
{
    public $a = "5";
    public $b = "7";
    public $c = "9";
}

$x = new myClass_1();

/**
 * 5
 * 7
 * 9
 */

foreach ($x as $attribute) {
//    echo $attribute . "<br>";
}

/**
 * --------------------------------------------------------------------------
 */
class myClass_2
{
    public $a = "5";
    private $b = "7";
    protected $c = "9";
}

/*
 * 5
 */

$x = new myClass_2();

foreach ($x as $attribute) {
//    echo $attribute . "<br>";
}

/**
 * --------------------------------------------------------------------------
 */

class myClass_3
{
    public $a = "5";
    public $b = "7";
    public $c = "9";

    public function d()
    {
        echo "d<br>";
    }

    public function e()
    {
        echo "e<br>";
    }
}

/**
 * 5
 * 7
 * 9
 * //迭代类属性, 不迭代类方法
 */

$x = new myClass_3();

foreach ($x as $attribute) {
    echo $attribute . "<br>";
}