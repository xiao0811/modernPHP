<?php
/**
 * Created by PhpStorm.
 * User: 骁傻
 * Date: 2018-3-26
 * Time: 15:23
 */

class Bim
{
    public function doSomeThing()
    {
        echo __METHOD__ . '|';
    }
}

class Bar
{
    private $bim;

    public function __construct(Bim $bim)
    {
        $this->bim = $bim;
    }

    public function doSomeThing()
    {
        $this->bim->doSomeThing();
        echo __METHOD__ . '|';
    }
}

class Foo
{
    private $bar;

    public function __construct(Bar $bar)
    {
        $this->bar = $bar;
    }

    public function doSomeThing()
    {
        $this->bar->doSomeThing();
        echo __METHOD__ . '|';
    }
}

class Container
{
    private $s = [];

    function __set($name, $value)
    {
        // TODO: Implement __set() method.
        $this->s[$name] = $value;
    }

    function __get($name)
    {
        // TODO: Implement __get() method.
        return $this->s[$name]($this);
    }
}

$con = new Container();

$con->bim = function () {
    return new Bim();
};

$con->bar = function ($con){
    return new Bar($con->bim);
};

$con->foo = function ($con){
    return new Foo($con->bar);
};

$foo = $con->foo;
$foo->doSomeThing();
