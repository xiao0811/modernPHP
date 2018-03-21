<?php
/**
 * Created by PhpStorm.
 * User: 骁傻
 * Date: 2018-3-16
 * Time: 13:38
 */
class XiaoRedis
{
    protected $redis;

    public function __construct()
    {
        $this->redis = new Redis();
        $this->redis->connect('127.0.0.1');
    }

    public function add($key, $value)
    {
        return $this->redis->set($key, $value);
    }

    public function get($key)
    {
        return $this->redis->get($key);
    }
}