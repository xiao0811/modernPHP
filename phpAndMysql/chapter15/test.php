<?php
/**
 * Created by PhpStorm.
 * User: 骁傻
 * Date: 2018-5-9
 * Time: 15:46
 */


if (!strpos($_SERVER['HTTP_REFERER'], '192.168.0.109')) {
    header('Location:http://www.baidu.com');
} else {
    echo "zhengque";
}
