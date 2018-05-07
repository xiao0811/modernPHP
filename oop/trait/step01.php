<?php
/**
 * Created by PhpStorm.
 * User: 骁傻
 * Date: 2018-5-7
 * Time: 14:14
 */

trait logger
{
    public function logmessage($message, $lavel = "DEBUG")
    {
        echo "write \$message to a log";
    }
}

class fileStorage
{
    use logger;

    public function store($data)
    {
        $msg = "xiaosha";
        $this->logmessage($msg);
    }
}

$file = new fileStorage();

$file->store("xiaosha");