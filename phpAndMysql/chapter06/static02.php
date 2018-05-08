<?php
/**
 * Created by PhpStorm.
 * User: 骁傻
 * Date: 2018-5-8
 * Time: 9:30
 */

class A
{
    static public function whichclass()
    {
        echo __CLASS__ . "<br>";
    }

    static public function test()
    {
        self::whichclass();
    }
}

class B extends A
{
    static public function whichclass()
    {
        echo __CLASS__ . "<br>";
    }
}

A::test();  // A
B::test();  // A

/**
 * static 修饰确保PHP使用了运行时调用的类, 也就是延迟的意思 Delay
 */


class C
{
    static public function whichclass()
    {
        echo __CLASS__ . "<br>";
    }

    static public function test()
    {
        static::whichclass();
    }
}

class D extends C
{
    static public function whichclass()
    {
        echo __CLASS__ . "<br>";
    }
}

C::test();  // C
D::test();  // D

class E
{
    public function whichclass()
    {
        echo __CLASS__ . "<br>";
    }

    public function test()
    {
        self::whichclass();
    }
}

class F extends E
{
    public function whichclass()
    {
        echo __CLASS__ . "<br>";
    }
}

$e = new E();
$f = new F();

$e->test();     // E
$f->test();     // E

class G
{
    public function whichclass()
    {
        echo __CLASS__ . "<br>";
    }

    public function test()
    {
        static::whichclass();
    }
}

class H extends G
{
    public function whichclass()
    {
        echo __CLASS__ . "<br>";
    }
}

$g = new G();
$h = new H();

$g->test();     // G
$h->test();     // H