<?php
/**
 * Created by PhpStorm.
 * User: 骁傻
 * Date: 2018-5-7
 * Time: 14:20
 */

trait fileLogger
{
    public function logmessage($message, $level = 'DEBUG')
    {
        echo "write $message to a log file.<br>";
    }
}

trait sysLogger
{
    public function logmessage($message, $level = 'ERROR')
    {
        echo "write $message to the syslog.<br>";
    }
}

trait xiaoLogger
{
    public function logmessage($message, $level = 'XIAO')
    {
        echo "write $message to the xiaolog.<br>";
    }
}

class fileStorage
{
    use fileLogger, sysLogger, xiaoLogger
    {
        /**
         * insteadof 代替
         * 这里表示两个trait里相同的方法选择 fileLogger的那个
         * 实例只有一个, 测试加了一个xiaoLogger
         *
         * 下面两个要使用需要取一个别名 (public, private 不是必须的)
         */
        fileLogger::logmessage insteadof sysLogger, xiaoLogger;
        sysLogger::logmessage as private logsysmessage;
        xiaoLogger::logmessage as public xiaomessage;
    }

    public function store($data)
    {
        $message = "Hello, world!";
        $this->logmessage($message);
        $this->logsysmessage($message);
        $this->xiaomessage($message);
    }
}

$file = new fileStorage();

$file->store('xiaosha');
