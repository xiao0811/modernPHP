<?php
/**
 * Created by PhpStorm.
 * User: 骁傻
 * Date: 2018-3-16
 * Time: 10:44
 */

function dd($data, $die = false)
{
    echo "<pre>";
    var_dump($data);
    echo "</pre>";
    if ($die === true) {
        die();
    }
}