<?php
/**
 * Created by PhpStorm.
 * User: 骁傻
 * Date: 2018-3-29
 * Time: 9:30
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
        // TODO: Implement __set() method.
        $this->s[$name] = $value;
    }

    public function __get($name)
    {
        // TODO: Implement __get() method.
        return $this->build($this->s[$name]);
    }

    public function build($className)
    {
        if ($className instanceof Closure) {
            return $className($this);
        }

        $reflector = new ReflectionClass($className);

        if (!$reflector->isInstantiable()) {
            throw new Exception("Can't instantiate this.");
        }

        $constructor = $reflector->getConstructor();

        if (is_null($constructor)) {
            return new $className;
        }

        $parameters = $constructor->getParameters();
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
                $dependencies[] = $this->build($dependency->name);
            }
        }

        return $dependencies;
    }

    public function resolveNonClass($parameter)
    {
        if ($parameter->isDefaultValueAvailable) {
            return $parameter->getDefaultValue();
        }

        throw new Exception("I have no idea what to do here.");
    }
}

$c = new Container();
//var_dump($c);

$c->bim = 'Bim';

$bim = $c->bim;
$bim->doSomeThing();