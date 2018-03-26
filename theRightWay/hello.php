<?php
/**
 * Created by PhpStorm.
 * User: 骁傻
 * Date: 2018-3-26
 * Time: 14:03
 */

//if ($argc != 2) {
//    echo "Usage: php hello.php [name].\n";
//    exit(1);
//}
//$name = $argv[1];
//echo "Hello " . $name . "\n";

for ($i = 0; $i < $argc; $i++) {
    echo "$argv[$i]\n";
}