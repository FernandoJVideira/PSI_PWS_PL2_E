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
$id = 0;

if (isset($_GET['r']))
    $route = $_GET['r'];

if(isset($_GET['id']))
    $id = $_GET['id'];

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
    case 'book/show':
        $book ->show($id);
        break;
    case 'book/edit':
        break;
    case 'book/destroy':
        break;
    default:
        $home -> index();
}