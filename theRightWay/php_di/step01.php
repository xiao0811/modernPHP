<?php
/**
 * Created by PhpStorm.
 * User: 骁傻
 * Date: 2018-3-26
 * Time: 15:12
 */

class Bim
{
    public function doSomething()
    {
        echo __METHOD__ . '|';
    }
}

class Bar
{
    public function doSomeThing()
    {
        $bim = new Bim();
        $bim->doSomething();
        echo __METHOD__ . '|';
    }
}

class Foo
{
    public function doSomeThing()
    {
        $bar = new Bar();
        $bar->doSomeThing();
        echo __METHOD__ . '|';
    }
}
$foo = new Foo();
$foo->doSomeThing();