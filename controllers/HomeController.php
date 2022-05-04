<?php

class HomeController
{
    public function index()
    {
        $baseCont = new BaseController();
        $baseCont -> renderView('home/index.php');

    }
}