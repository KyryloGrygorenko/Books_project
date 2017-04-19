<?php

function db_connect($host, $user, $pass, $db)
{
    $link = @mysqli_connect($host, $user, $pass, $db);

    if (mysqli_connect_errno()) {
        die(mysqli_connect_error());
    }
    
    return $link;
}

function mysql_get_result($link, $sql)
{
    $res = mysqli_query($link, $sql);
    
    if ($res === false) {
        die(mysqli_error($link));
    }
    
    return $res;
}

define('DATA_FILE', 'messages.txt');
define('FLASH_KEY', 'flash_message');
// functions
// todo : определять в какой цвет закрасить сообщение в зависимости от успеха/фейла
function setFlash($message)
{
    $_SESSION[FLASH_KEY] = $message;
}
function getFlash()
{
    if (!isset($_SESSION[FLASH_KEY])) {
        return null;
    }
    
    $message = $_SESSION[FLASH_KEY];
    unset($_SESSION[FLASH_KEY]);
    
    return $message;
}

function redirect($to)
{
    header("Location: {$to}");
    die;
}
function requestPost($key, $default = null)
{
    return isset($_POST[$key]) ? $_POST[$key] : $default;
}
function requestGet($key, $default = null)
{
    return isset($_GET[$key]) ? $_GET[$key] : $default;
}
function isRequestPost()
{
    return (bool) $_POST;
}
function isFormValid()
{
    $captchaValid = $_SESSION['captcha_number'] == requestPost('security_number');
    return $captchaValid && trim(requestPost('username')) != '' && trim(requestPost('email')) != '' && trim(requestPost('message')) != '';
}


function debug ($variable) 
{
    echo '<pre>';
    print_r($variable);
    echo '</pre>';
}