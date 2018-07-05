<?php
/**
 * Created by PhpStorm.
 * User: panxiao
 * Date: 2018/7/5
 * Time: 下午9:47
 */

class Test
{
    public function index()
    {
        return __DIR__ . "<br>";
    }
}

$test = new Test();
echo "modernPHP/dir下的Test.php中调用: " . $test->index();