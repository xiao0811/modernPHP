<?php
/**
 * Created by PhpStorm.
 * User: 骁傻
 * Date: 2018-4-10
 * Time: 16:21
 */
require_once "Code.class.php";
session_start();
$code = new Code();
echo $code->get();