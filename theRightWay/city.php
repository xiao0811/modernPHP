<?php
/**
 * Created by PhpStorm.
 * User: 骁傻
 * Date: 2018-4-2
 * Time: 16:49
 */

$data = file_get_contents("city.json");
//echo $data;

$citys = json_decode($data);

/**
foreach ($citys as $city) {

}
*/
echo "<pre>";
var_dump($citys);
echo "</pre>";