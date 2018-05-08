<?php
/**
 * Created by PhpStorm.
 * User: 骁傻
 * Date: 2018-5-8
 * Time: 12:49
 */

class Printable
{
    public $testone;
    public $testtwo;

    public function __toString()
    {
        // TODO: Implement __toString() method.
        return var_export($this, true);
    }
}

$p = new Printable();
echo $p;