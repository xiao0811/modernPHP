<?php
/**
 * Created by PhpStorm.
 * User: 骁傻
 * Date: 2018-5-10
 * Time: 11:18
 */

$algo = "xiaosha";

$hah = password_hash('rasmuslerdorf', PASSWORD_BCRYPT, ['cost' => 10]);
echo "$hah <br>";
var_dump(password_verify('rasmuslerdorf', $hah));