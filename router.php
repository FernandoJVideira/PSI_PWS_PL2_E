<?php

require_once 'startup/boot.php';
require_once 'controllers/BaseController.php';
require_once 'controllers/BaseAuthController.php';
require_once 'controllers/AuthController.php';
require_once 'controllers/PlanController.php';
require_once 'controllers/HomeController.php';
require_once 'controllers/BookController.php';

$auth = new AuthController();
$plan = new PlanController();
$home = new HomeController();
$book = new BookController();

$route = '';

if (isset($_GET['r']))
{
    $route = $_GET['r'];
}

switch ($route) 
{
    case 'auth/login':
        $auth -> authlogin();
        break;
    case 'auth/logout':
        $auth -> authlogout();
        break;
    case 'plan/index':       
        $plan -> index();
        break;
    case 'book/index':
        $book -> index();
        break;
    default:
        $home -> index();
}