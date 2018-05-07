<?php
/**
 * Created by PhpStorm.
 * User: 骁傻
 * Date: 2018-5-7
 * Time: 9:52
 */

class manners
{
    private $greeting = 'Hello';

    public function greet($name)
    {
        echo "$this->greeting, $name";
    }
}

$abc = new manners();

//echo $abc->greet("xiaosha");

class School
{
    private $class;

    public function __get($name)
    {
        // TODO: Implement __get() method.
        return $this->$name;
    }

    public function __set($name, $value)
    {
        // TODO: Implement __set() method.
        if ($name == 'class') {
            if ($value > 10 || !is_int($value)) {
                $this->class = 10;
            } else {
                $this->$name = $value;
            }
        }
    }
}

$xincang = new School();
$xincang->class = 3;
var_dump($xincang->class);