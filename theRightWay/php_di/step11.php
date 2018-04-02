<?php
/**
 * Created by PhpStorm.
 * User: 骁傻
 * Date: 2018-4-2
 * Time: 8:43
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

class Too
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
    private $bar, $too;

    public function __construct(Bar $bar, Too $too)
    {
        $this->bar = $bar;
        $this->too = $too;
    }

    public function doSomeThing()
    {
        $this->bar->doSomeThing();
        $this->too->doSomeThing();
        echo __METHOD__ . '|';
    }
}

class Container
{
    private $s = [];

    public function __set($name, $value)
    {
        // TODO: Implement __set() method.
        $this->s[$name] = $value;
    }

    public function __get($name)
    {
        // TODO: Implement __get() method.
        return $this->build($this->s[$name]);
    }

    public function getS()
    {
        return $this->s;
    }

    public function build($className, $flag = false)
    {
        if ($flag) {
//            echo "递归解析{$className}";
        } else {
//            echo "非递归解析{$className}";
        }

        if ($className instanceof Closure) {
            return $className($this);
        }

        $reflector = new ReflectionClass($className);

        if (!$reflector->isInstantiable()) {
            throw new Exception("Can't instantiate this.");
        }

        $construtor = $reflector->getConstructor();

        if (is_null($construtor)) {
            return new $className;
        }

        $parameters = $construtor->getParameters();

        $dependencies = $this->getDependencies($parameters);

        return $reflector->newInstanceArgs($dependencies);
    }

    public function getDependencies($parameters)
    {
        $dependencies = [];

        foreach ($parameters as $parameter) {
            $dependency = $parameter->getClass();

            if (is_null($dependency)) {
                $dependencies[] = $this->resolveNonClass($parameter);
            } else {
                $dependencies[] = $this->build($dependency->name, true);
            }
        }

        return $dependencies;
    }

    public function resolveNonClass($parameter)
    {
        if ($parameter->isDefaultValueAvailable()) {
            return $parameter->getDefaultValue();
        }
    }
}

$di = new Container();

$di->foo = 'Foo';

//var_dump($di->getS());
$foo = $di->foo;

//var_dump($foo);
$foo->doSomeThing();