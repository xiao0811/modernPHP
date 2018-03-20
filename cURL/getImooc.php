<?php
/**
 * Created by PhpStorm.
 * User: panxiao
 * Date: 2018/3/20
 * Time: 下午7:15
 */

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://www.zhihu.com/signup');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

date_default_timezone_set('PRC');
curl_setopt($ch, CURLOPT_COOKIESESSION, 1);
curl_setopt($ch, CURLOPT_COOKIEFILE, 'cookiefile');
curl_setopt($ch, CURLOPT_COOKIEJAR, 'cookiefile');
curl_setopt($ch, CURLOPT_COOKIE, session_name() . '=' . session_id());
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);

curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
curl_setopt($ch, CURLOPT_HTTPHEADER, array("application/x-www-form-urlencoded;
    charset=utf-8",
    "Content-length: " . strlen($data)
));

curl_exec($ch);

curl_setopt($ch, CURLOPT_URL, 'http://www.zhihu.com');
curl_setopt($ch, CURLOPT_POST, 0);
curl_setopt($ch, CURLOPT_HTTPHEADER, array("Content-type: text/xml"));
$res = curl_exec($ch);
echo $res;
