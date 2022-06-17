<?php
require_once "controllers/BaseController.php";
class HomeController extends BaseController
{
    public function index()
    {
        $this->renderView('home/index.php');
    }

    public function erro()
    {
        $this->renderView('home/erro.php');
    }
}
