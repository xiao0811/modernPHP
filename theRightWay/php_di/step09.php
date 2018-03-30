<?php
/**
 * Created by PhpStorm.
 * User: 骁傻
 * Date: 2018-3-30
 * Time: 13:42
 */

class Bim
{
    private $i, $j;

    public function __construct($i, $j)
    {
        $this->i = $i;
        $this->j = $j;
    }

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

    public function getS()
    {
        return $this->s;
    }

    public function build($className)
    {
        if ($className instanceof Closure) {
            return $className($this);
        }

        if (!is_array($className)) {
            throw new Exception("Here must array.");
        }

        foreach ($className as $key => $value) {
            $class = $key;
            foreach ($value as $val) {
                $param[] = $val;
            }
        }

        $reflector = new ReflectionClass($class);

        if (!$reflector->isInstantiable()) {
            throw new Exception("Can't instantiate this.");
        }

        $construtor = $reflector->getConstructor();
        if (is_null($construtor)) {
            return new $className;
        }

        $parameters = $construtor->getParameters();
        $dependencies = $this->getDependencies($parameters);

        return $reflector->newInstanceArgs($param);
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
        if ($parameter->isDefaultValueAvailable()) {
            return $parameter->getDefaultValue();
        }
    }
}

$c = new Container();

//var_dump($c);
$c->bim = [
    'Bim' => [1, 2]
];

//var_dump($c->getS());
$bim = $c->bim;
$bim->doSomeThing();