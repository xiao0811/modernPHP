<?php
/**
 * Created by PhpStorm.
 * User: 骁傻
 * Date: 2018-3-14
 * Time: 14:03
 */
//echo $_POST['email'];die();
try {
    // 验证电子邮件地址
    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
    if (!$email) {
        throw new Exception('Invalid email');
    }

//    echo $_POST['password'];
    // 验证密码
    $password = filter_input(INPUT_POST, 'password');
    if (!$password || mb_strlen($password) < 8) {
        throw new Exception('Password must contain 8+ characters');
    }
    // 创建密码的哈希值
    $passwordHash = password_hash(
        $password,
        PASSWORD_DEFAULT,
        ['cost' => 12]
    );

    if ($passwordHash === false) {
        throw new Exception('Password hash failed');
    }

    // 创建用户账户
    $user = new User();
    $user->email = $email;
    $user->password_hash = $passwordHash;
    $user->save();

    // 重定向到登录页面
    header('HTTP/1.1 302 Redirect');
    header('Location: /login.php');
} catch (Exception $e) {
    // 报告错误
    header('HTTP/1.1 400 Bad request');
    echo $e->getMessage();
}