<?php
/**
 * Created by PhpStorm.
 * User: 骁傻
 * Date: 2018-3-28
 * Time: 8:45
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

    public function __set($name, $value)
    {
        $this->s[$name] = $value;
    }

    public function __get($name)
    {
        return $this->build($this->s[$name]);
    }

    public function getS()
    {
        return $this->s;
    }

    public function build($className)
    {
        if ($className instanceof Closure) {
            return $className($this);
        }

        $reflector = new ReflectionClass($className);

        // 检查类是否可实例化, 排除抽象类abstract和对象接口interface
        if (!$reflector->isInstantiable()) {
            throw new Exception("Can't instantiate this.");
        }

        // 获取类的构造函数
        $constructor = $reflector->getConstructor();

        // 若无构造函数,直接实例化并返回
        if (is_null($constructor)) {
            return new $className;
        }

        // 取构造函数参数, 通过ReflectionParameter 数组返回参数列表
        $parameters = $constructor->getParameters();

        // 递归解析构造函数的参数
        $dependencies = $this->getDependencies($parameters);

        // 创建一个类的新实例, 给出的参数将传递到类的构造函数
        return $reflector->newInstanceArgs($dependencies);
    }

    public function getDependencies($parameters)
    {
        $dependencies = [];

        foreach ($parameters as $parameter) {
            $dependency = $parameter->getClass();

            if (is_null($dependency)) {
                // 是变量,有默认值则设置默认值
                $dependencies[] = $this->resolveNonClass($parameter);
            } else {
                // 是一个类, 递归解析
                $dependencies[] = $this->build($dependency->name);
            }
        }

        return $dependencies;
    }

    public function resolveNonClass($parameter)
    {
        // 有默认值则返回默认值
        if ($parameter->isDefaultValueAvailable()) {
            return $parameter->getDefaultValue();
        }

        throw new Exception("I have no idea what to do here.");
    }
}

$c = new Container();

$c->bar = 'Bar';
$c->foo = function ($c) {
    return new Foo($c->bar);
};

$foo = $c->foo;
//var_dump($foo);

//$foo->doSomeThing();

$di = new Container();
$di->foo = 'Foo';

$foo = $di->foo;

//var_dump($foo);
$foo->doSomeThing();