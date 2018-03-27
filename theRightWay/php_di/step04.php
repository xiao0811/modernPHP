<?php
/**
 * Created by PhpStorm.
 * User: 骁傻
 * Date: 2018-3-27
 * Time: 9:06
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

class Ioc
{
    protected static $registry = [];

    public static function bind($name, Callable $resolver)
    {
        static::$registry[$name] = $resolver;
    }

    public static function make($name)
    {
        if (isset(static::$registry[$name])) {
            $resolver = static::$registry[$name];
            return $resolver();
        }
        throw new Exception('Alias does not exist in the Ioc registry');
    }
}

Ioc::bind('bim', function () {
    return new Bim();
});

Ioc::bind('bar', function () {
    return new Bar(Ioc::make('bim'));
});

Ioc::bind('foo', function () {
    return new Foo(Ioc::make('bar'));
});

$foo = Ioc::make('foo');
$foo->doSomeThing();