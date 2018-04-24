<?php
/**
 * Created by PhpStorm.
 * User: 骁傻
 * Date: 2018-4-24
 * Time: 11:31
 */

echo "这是外面的POST: " . $_POST['name'] . "<br>";

function abc()
{
    echo "这是函数里面的POST: " . $_POST['name'];
}

abc();
