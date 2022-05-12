<?php

class HomeController
{
    public function index()
    {

        require_once "controllers/Basecontroller.php";
        $baseCont = new BaseController();
        $baseCont -> renderView('home/index.php');

    }
}