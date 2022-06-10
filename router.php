<?php

require_once 'startup/boot.php';
require_once 'controllers/AuthController.php';
require_once 'controllers/UserController.php';
require_once 'controllers/HomeController.php';
require_once 'controllers/IvaController.php';
require_once 'controllers/FaturaController.php';

$auth = new AuthController();
$home = new HomeController();
$user = new UserController();
$iva = new IvaController();
$fatura = new FaturaController();

$route = '';

if (isset($_GET['r'])) {
    $route = $_GET['r'];
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
}

switch ($route) {

        //Auth

    case 'auth/login':
        $auth->authlogin();
        break;
    case 'auth/logout':
        $auth->authlogout();
        break;

        //User

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

        //Iva

    case 'iva/create':
        $iva->create();
        break;
    case 'iva/store':
        $iva->store();
        break;
    case 'iva/index':
        $iva->index();
        break;
    case 'iva/edit':
        $iva->edit($id);
        break;
    case 'iva/update':
        $iva->update($id);
        break;
    case 'iva/delete':
        $iva->delete($id);
        break;

        //Home

    default:
        $home->index();
}
