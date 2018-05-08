<?php
/**
 * Created by PhpStorm.
 * User: 骁傻
 * Date: 2018-5-8
 * Time: 9:02
 */

interface Displayable{}

class A implements Displayable{}

class B implements Displayable{}

$b = new B();

var_dump($b instanceof B);              // bool(true)
var_dump($b instanceof A);              // bool(false)
var_dump($b instanceof Displayable);    // bool(true)

interface Xiaosha{}

class C implements Xiaosha{}

class D extends C{}

$d = new D();

var_dump($d instanceof C);              // bool(true)
var_dump($d instanceof D);              // bool(true)
var_dump($d instanceof Xiaosha);        // bool(true)

function check_hint(B $someclass)
{
    echo "Xiaosha<br>";
}

function check_d(D $someclass)
{
    echo "Xiaosha<br>";
}

function check_c(C $someclass)
{
    echo "Xiaosha<br>";
}

check_hint($b);     // Xiaosha
//check_hint($d);     // Fatal error: Uncaught TypeError: Argument 1 passed to check_hint() must be an instance of B, instance of D given

check_d($d);        // Xiaosha
$c = new C();
//check_d($c);        // Fatal error: Uncaught TypeError: Argument 1 passed to check_d() must be an instance of D, instance of C given

check_c($c);        // Xiaosha
check_c($d);        // Xiaosha
