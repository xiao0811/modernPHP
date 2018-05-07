<?php
/**
 * Created by PhpStorm.
 * User: 骁傻
 * Date: 2018-5-7
 * Time: 10:08
 */

class A
{
    public $attribute1;

    public function operation1()
    {
        echo "This is A's operation and attribute = $this->attribute1<br>";
    }
}

class B extends A
{
    public $attribute2;

    public function operation2()
    {
        echo "This is B's operation and attribute = $this->attribute2<br>";
    }
}

/**
 * This is A's operation and attribute = 10
 * This is B's operation and attribute = 20
 */

$b = new B();

$b->attribute1 = 10;
$b->operation1();
$b->attribute2 = 20;
$b->operation2();


/*
 * This is A's operation and attribute = 10
 * Fatal error: Uncaught Error: Call to undefined method A::operation2()
 * in .../modernPHP/oop/extends.php:46 Stack trace:
 * #0 {main} thrown in .../modernPHP/oop/extends.php on line 46
 */
//$b = new A();
//
//$b->attribute1 = 10;
//$b->operation1();
//$b->attribute2 = 20;
//$b->operation2();