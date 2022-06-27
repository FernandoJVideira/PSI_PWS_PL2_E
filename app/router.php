<?php

require_once 'startup/boot.php';
require_once 'controllers/AuthController.php';
require_once 'controllers/UserController.php';
require_once 'controllers/HomeController.php';
require_once 'controllers/IvaController.php';
require_once 'controllers/FaturaController.php';
require_once 'controllers/ProdutoController.php';
require_once 'controllers/LinhaController.php';
require_once 'controllers/EmpresaController.php';

$auth = new AuthController();
$home = new HomeController();
$user = new UserController();
$product = new ProdutoController();
$iva = new IvaController();
$linha = new LinhaController();
$fatura = new FaturaController();
$empresa = new EmpresaController();

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
        //Ptoduto
    case 'produto/create':
        $product->create();
        break;
    case 'produto/store':
        $product->store();
        break;
    case 'produto/index':
        $product->index();
        break;
    case 'produto/edit':
        $product->edit($id);
        break;
    case 'produto/update':
        $product->update($id);
        break;
    case 'produto/delete':
        $product->delete($id);
        break;
        //LinhaFatura
    case 'linha/create':
        $linha->create($id, isset($_GET['idp']) ? $_GET['idp'] : null);
        break;
    case 'linha/store':
        $linha->store($id);
        break;
    case 'linha/delete':
        $linha->delete($id);
        break;
    case 'linha/pesquisa':
        $linha->pesquisa($id);
        break;
        //Fatura
    case 'fatura/index':
        $fatura->index();
        break;
    case 'fatura/create':
        $fatura->create();
        break;
    case 'fatura/store':
        $fatura->store($id);
        break;
    case 'fatura/edit':
        $fatura->edit($id);
        break;
    case 'fatura/update':
        $fatura->update($id);
        break;
    case 'fatura/delete':
        $fatura->delete($id);
        break;
    case 'fatura/emitir':
        $fatura->done($id);
        break;
    case 'fatura/print':
        $fatura->show($id);
        break;
        //Empresa
    case 'empresa/index':
        $empresa->index();
        break;
    case 'empresa/edit':
        $empresa->edit($id);
        break;
    case 'empresa/update':
        $empresa->update($id);
        break;
        //Home
    case 'home/erro':
        $home->erro();
        break;
    default:
        $home->index();
}
