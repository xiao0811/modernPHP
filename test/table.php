<?php
/**
 * Created by PhpStorm.
 * User: 骁傻
 * Date: 2018-4-23
 * Time: 9:35
 */

function build_row(&$text)
{
    $text = "<tr><td>$text</td></tr>";
}

echo '<table border="1">';
$t = "测试数据";
build_row($t);
//$row = &build_row($t);

echo $t;
echo $t;
echo $t;
echo "</table>";
