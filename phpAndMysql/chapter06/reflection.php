<?php
/**
 * Created by PhpStorm.
 * User: 骁傻
 * Date: 2018-5-8
 * Time: 13:41
 */

require_once "../TLA/page.php";

$class = new ReflectionClass("Page");
echo "<pre>" . $class . "</pre>";

///**
// * Created by PhpStorm.
// * User: 骁傻
// * Date: 2018-5-7
// * Time: 15:10
// */
//Class [  class Page ] {
//    @@ /home/xiaosha/Desktop/code/modernPHP/phpAndMysql/TLA/page.php 9-131
//
//    - Constants [0] {
//    }
//
//  - Static properties [0] {
//    }
//
//  - Static methods [0] {
//    }
//
//  - Properties [4] {
//        Property [  public $content ]
//    Property [  public $title ]
//    Property [  public $keywords ]
//    Property [  public $buttons ]
//  }
//
//  - Methods [11] {
//        Method [  public method __set ] {
//            @@ /home/xiaosha/Desktop/code/modernPHP/phpAndMysql/TLA/page.php 25 - 29
//
//            - Parameters [2] {
//                Parameter #0 [  $name ]
//        Parameter #1 [  $value ]
//      }
//    }
//
//    Method [  public method __get ] {
//            @@ /home/xiaosha/Desktop/code/modernPHP/phpAndMysql/TLA/page.php 31 - 35
//
//            - Parameters [1] {
//                Parameter #0 [  $name ]
//      }
//    }
//
//    Method [  public method Display ] {
//            @@ /home/xiaosha/Desktop/code/modernPHP/phpAndMysql/TLA/page.php 37 - 49
//    }
//
//    Method [  public method DisplayTitle ] {
//            @@ /home/xiaosha/Desktop/code/modernPHP/phpAndMysql/TLA/page.php 51 - 54
//    }
//
//    Method [  public method DisplayKeywords ] {
//            @@ /home/xiaosha/Desktop/code/modernPHP/phpAndMysql/TLA/page.php 56 - 59
//    }
//
//    Method [  public method DisplayStyles ] {
//            @@ /home/xiaosha/Desktop/code/modernPHP/phpAndMysql/TLA/page.php 61 - 66
//    }
//
//    Method [  public method DisplayHeader ] {
//            @@ /home/xiaosha/Desktop/code/modernPHP/phpAndMysql/TLA/page.php 68 - 77
//    }
//
//    Method [  public method DisplayMenu ] {
//            @@ /home/xiaosha/Desktop/code/modernPHP/phpAndMysql/TLA/page.php 79 - 87
//
//            - Parameters [1] {
//                Parameter #0 [  $buttons ]
//      }
//    }
//
//    Method [  public method DisplayButton ] {
//            @@ /home/xiaosha/Desktop/code/modernPHP/phpAndMysql/TLA/page.php 89 - 108
//
//            - Parameters [3] {
//                Parameter #0 [  $name ]
//        Parameter #1 [  $url ]
//        Parameter #2 [  $active = true ]
//      }
//    }
//
//    Method [  public method IsURLCurrentPage ] {
//            @@ /home/xiaosha/Desktop/code/modernPHP/phpAndMysql/TLA/page.php 110 - 117
//
//            - Parameters [1] {
//                Parameter #0 [  $url ]
//      }
//    }
//
//    Method [  public method DisplayFooter ] {
//            @@ /home/xiaosha/Desktop/code/modernPHP/phpAndMysql/TLA/page.php 119 - 130
//    }
//  }
//}