<?php

require_once 'startup/boot.php';
require_once 'controllers/AuthController.php';
require_once 'controllers/PlanController.php';
require_once 'controllers/HomeController.php';
require_once 'controllers/BookController.php';
require_once 'controllers/ChapterController.php';

$auth = new AuthController();
$plan = new PlanController();
$home = new HomeController();
$book = new BookController();
$chapter = new ChapterController();

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
    case 'plan/index':       
        $plan->index();
        break;
    case 'book/index':
        $book->index();
        break;
    case 'book/show':
        $book->show($id);
        break;
    case 'book/edit':
        $book->edit($id);
        break;
    case 'book/update':
        $book->update($id);
        break;
    case 'book/create':
        $book->create($book);
        break;
    case 'book/store':
        $book->store();
        break;
    case 'book/destroy':
        $book->delete($id);
        break;
    case 'chapter/index':
        $chapter->index($id);
        break;
    case 'chapter/create':
        $chapter->create($id);
        break;
    case 'chapter/store':
        $chapter->store();
        break;
    default:
        $home->index();
}