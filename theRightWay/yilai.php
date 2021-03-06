<?php
/**
 * Created by PhpStorm.
 * User: 骁傻
 * Date: 2018-3-26
 * Time: 14:51
 */
//namespace Database;
//class Database
//{
//    protected $adapter;
//
//    public function __construct()
//    {
//        $this->adapter = new MySqlAdapter;
//        echo $this->adapter->name;
//    }
//}
//
//class MySqlAdapter
//{
//    public $name = "xiaosha";
//}
//
//new Database();
namespace  Database;

class Database
{
    protected $adapter;

    public function __construct(MySqlAdapter $adapter)
    {
        $this->adapter = $adapter;
    }

    public function xiaosha()
    {
        $this->adapter->xiaosha();
    }
}

class MySqlAdapter
{
    public function xiaosha()
    {
        echo "xiaosha";
    }
}

$xiao = new Database(new MySqlAdapter());

$xiao->xiaosha();