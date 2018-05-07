<?php
/**
 * Created by PhpStorm.
 * User: 骁傻
 * Date: 2018-5-7
 * Time: 10:43
 */

class A
{
    public $attribute = 'default value';

    public function operation()
    {
        echo "Something<br>";
        echo "The value of \$attribute is " . $this->attribute . "<br>";
    }
}

class B extends A
{
    public $attribute = 'different value';

    public function operation()
    {
        echo "Something else<br>";
        echo "The value of \$attribute is " . $this->attribute . "<br>";
    }

    public function parent_do()
    {
        A::operation();     //parent::operation();
    }
}

/**
 * Something
 * The value of $attribute is default value
 */
//$a = new A();
//$a->operation();

/**
 * Something else
 * The value of $attribute is different value
 */
$b = new B();
//$b->operation();

/**
 * Something
 * The value of $attribute is different value
 */
$b->parent_do();