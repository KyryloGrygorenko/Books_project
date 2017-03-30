<?php
error_reporting(E_ALL);
require 'includes/functions.php';


/*$sql="select * from author";
$res=mysqli_query($link,$sql);

$authors= mysqli_fetch_all($res, MYSQLI_ASSOC);

echo '<pre>';
var_dump($authors);
echo '</pre>';
die;*/

$link = db_connect('localhost', 'root', '', 'mvc');

define('ROOT', __DIR__ . '/');

session_start();

$page = requestGet('page', 'homepage');
$controllerPath = ROOT . '/page/' . $page . '.php';
if (!file_exists($controllerPath)) {
    http_response_code(404);
    $page = 'error';
    $controllerPath = 'page/' . $page . '.php';
}

require $controllerPath;

$template = 'templates/' . $page . '.php';


ob_start();
require $template;
$content = ob_get_clean();

$date = date('Y');
require 'templates/layout.php';

// var_dump(requestGet('page'));