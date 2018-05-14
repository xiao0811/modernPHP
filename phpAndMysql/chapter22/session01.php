<?php
/**
 * Created by PhpStorm.
 * User: 骁傻
 * Date: 2018-5-14
 * Time: 9:21
 */

session_start();

$_SESSION['session_var'] = "Hello, world!";

echo "The content of " . $_SESSION['session_var'] . "is" . $_SESSION['session_var'] . "<br>";