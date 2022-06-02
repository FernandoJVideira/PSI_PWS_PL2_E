<?php

require_once 'startup/boot.php';
require_once 'controllers/AuthController.php';
require_once 'controllers/HomeController.php';

$auth = new AuthController();
$home = new HomeController();

$route = '';

if (isset($_GET['r']))
{
    $route = $_GET['r'];
}
if (isset($_GET['id']))
{
    $id = $_GET['id'];
}

switch ($route)
{
    case 'auth/login':
        $auth->authlogin();
        break;
    case 'auth/logout':
        $auth->authlogout();
        break;
    default:
        $home->index();
}
