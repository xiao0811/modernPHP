<?php
/**
 * Created by PhpStorm.
 * User: 骁傻
 * Date: 2018-3-14
 * Time: 10:51
 */

require 'vendor/autoload.php';

$client = new \GuzzleHttp\Client();
$res = $client->request('GET', 'https://api.github.com/repos/guzzle/guzzle');
echo $res->getStatusCode();