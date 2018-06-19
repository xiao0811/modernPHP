<?php
/**
 * Created by PhpStorm.
 * User: panxiao
 * Date: 2018/6/19
 * Time: 下午7:04
 */
require "vendor/autoload.php";
require_once "../common/function.php";

$client = new \GuzzleHttp\Client();
$res = $client->request('get', 'http://www.baidu.com');

echo($res->getBody());