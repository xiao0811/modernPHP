<?php
/**
 * Created by PhpStorm.
 * User: 骁傻
 * Date: 2018-3-16
 * Time: 13:38
 */
class XiaoRedis
{
   public static function add()
   {
       $redis = new Redis();
       $redis->connect('127.0.0.1');
       $redis->set('abc', 'abc');
       echo $redis->get('abc');
   }
}