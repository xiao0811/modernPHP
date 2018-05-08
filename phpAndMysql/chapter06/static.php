<?php
/**
 * Created by PhpStorm.
 * User: 骁傻
 * Date: 2018-5-8
 * Time: 8:57
 */

class Math
{
    static function squared($input)
    {
        return $input * $input;
    }
}

echo Math::squared(10);