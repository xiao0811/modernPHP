<?php
/**
 * Created by PhpStorm.
 * User: 骁傻
 * Date: 2018-3-26
 * Time: 14:12
 */

$raw = '22. 11. 1968';
$start = DateTime::createFromFormat('d. m. Y', $raw);
echo 'Start date: ' . $start->format('Y-m-d') . "\n";