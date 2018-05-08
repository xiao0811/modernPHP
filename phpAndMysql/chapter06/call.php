<?php
/**
 * Created by PhpStorm.
 * User: 骁傻
 * Date: 2018-5-8
 * Time: 10:16
 */

class Xiaosha
{
    public function __call($name, $arguments)
    {
        // TODO: Implement __call() method.
        if ($name == 'display') {
            if (is_object($arguments[0])) {
                $this->displayObject($arguments[0]);
            } elseif (is_array($arguments[0])) {
                $this->displayArray($arguments[0]);
            } else {
                $this->displayScalar($arguments[0]);
            }
        }
    }

    private function displayObject($data)
    {
        echo "This is a Object.<br>";
    }

    private function displayArray($data)
    {
        echo "This is a Array.<br>";
    }

    private function displayScalar($data)
    {
        echo "This is a Scalar.<br>";
    }
}

$xiao = new Xiaosha();
$xiao->display(array(1, 2, 3));     // This is a Array.
$xiao->display("xiaosha");          // This is a Scalar.
$xiao->display($xiao);              // This is a Object.