<?php
/**
 * Created by PhpStorm.
 * User: 骁傻
 * Date: 2018-3-15
 * Time: 8:39
 */

//echo "abc";
//echo password_hash('rasmuslerdorf', PASSWORD_DEFAULT);
$pwd_hash = '$2y$10$KMIqMrAuC0LK9k5DfKW6Susv.ygbXOkRu0r8URIUzpZVPNuISj7bu';

if (password_verify('rasmuslerdorf', $pwd_hash)) {
    echo 'Go.....';
} else {
    echo 'Back...';
}