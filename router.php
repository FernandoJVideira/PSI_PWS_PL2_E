<?php

require_once 'startup/boot.php';
require_once 'controllers/AuthController.php';
require_once 'controllers/UserController.php';
require_once 'controllers/HomeController.php';

$auth = new AuthController();
$home = new HomeController();
$user = new UserController();

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
    case 'user/create':
        $user->create();
        break;
    case 'user/store':
        $user->store();
        break;
    case 'user/index':
        $user->index();
        break;
    case 'user/edit':
        $user->edit($id);
        break;
    case 'user/update':
        $user->update($id);
        break;
    case 'user/delete':
        $user->delete($id);
        break;
    default:
        $home->index();
}
