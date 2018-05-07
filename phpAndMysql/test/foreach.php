<?php
/**
 * Created by PhpStorm.
 * User: 骁傻
 * Date: 2018-5-7
 * Time: 15:41
 */

$buttons = [
    "Home" => "home.php",
    "Contact" => "contact.php",
    "Services" => "services.php",
    "Site Map" => "map.php",
];

foreach ($buttons as $key => $button){
    echo $key . "<br>";
}