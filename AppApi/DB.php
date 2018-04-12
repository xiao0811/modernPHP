<?php
/**
 * Created by PhpStorm.
 * User: panxiao
 * Date: 2018/4/5
 * Time: 下午1:50
 */

/**
 * Class Db
 * 单例模式
 * 只能创建一个实例, __construct 为非public
 */
class Db
{
    static private $_instance;

    private function __construct(){}

    public static function getInstance()
    {
        if (!(self::$_instance instanceof self)) {
            self::$_instance = new self();
        }

        return self::$_instance;
    }
}
