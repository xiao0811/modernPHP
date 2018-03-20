<?php
/**
 * Created by PhpStorm.
 * User: 骁傻
 * Date: 2018-3-20
 * Time: 13:59
 */
$data = [
    'theCityName' => '合肥',
];
$header = [
    'Content-Type: application/x-www-form-urlencoded;charset=utf-8',
];
$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, 'www.webxml.com.cn/WebServices/WeatherWebService.asmx/getWeatherbyCityName');
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
curl_setopt($ch, CURLOPT_HEADERFUNCTION, $header);
$res = curl_exec($ch);


var_dump($res);
curl_close($ch);
