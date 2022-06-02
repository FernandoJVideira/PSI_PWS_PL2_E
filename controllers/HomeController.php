<?php

class HomeController
{
    public function index()
    {

        require_once "controllers/BaseController.php";
        $baseCont = new BaseController();
        $baseCont -> renderView('home/index.php');

    }
}