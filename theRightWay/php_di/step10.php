<?php
/**
 * Created by PhpStorm.
 * User: panxiao
 * Date: 2018/4/1
 * Time: 上午12:06
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
        $this->bar->doSomeThing();
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
            echo "递归解析{$className}";
        } else {
            echo "非递归解析{$className}";
        }

        if ($className instanceof Closure) {
            return $className($this);
        }

        $refletor = new ReflectionClass($className);

        if (!$refletor->isInstantiable()) {
            throw new Exception("Can't instantiate this.");
        }

        $constructor = $refletor->getConstructor();

        if (is_null($constructor)) {
            return new $className;
        }

        $parameters = $constructor->getParameters();
        $dependencies = $this->getDependencies($parameters);
        $b = $refletor->newInstanceArgs($dependencies);
        return $b;
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
            return $parameter->getDefailtValue();
        }

        throw new Exception("I have no idea what to do here.");
    }
}

$di = new Container();
$di->foo = 'Foo';
//var_dump($di->getS());
$foo = $di->foo;
var_dump($foo);
//$foo->doSomeThing();