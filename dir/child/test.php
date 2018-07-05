<?php
/**
 * Created by PhpStorm.
 * User: panxiao
 * Date: 2018/7/5
 * Time: 下午9:49
 */

require_once "../Test.php";

$test = new Test();
echo "modernPHP/dir/child下的test.php中调用: " . $test->index();

/**
 * so __DIR__ 显示的是函数所在位置路径
 */