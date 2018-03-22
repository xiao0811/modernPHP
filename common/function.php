<?php
/**
 * Created by PhpStorm.
 * User: 骁傻
 * Date: 2018-3-22
 * Time: 13:47
 */

function dd($data, $die = false)
{
    echo "<pre>";
    var_dump($data);
    echo "</pre>";
    if ($die) {
        die();
    }
}

//function