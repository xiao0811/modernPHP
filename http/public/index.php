<?php

require_once "../vendor/autoload.php";
require_once "../../common/function.php";

$arr = ["abc", "bcd", "edu"];

$str = isset($_GET['str']) ? $_GET['str'] : 'xiaosha';
if (in_array($str, $arr)) {
    echo "Yes!";
}
