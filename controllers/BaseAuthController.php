<?php

require_once 'BaseController.php';

class BaseAuthController extends BaseController
{
    public function loginFilter()
    {
        require_once "models/Auth.php";
        $auth = new Auth();

        if ($auth->isLoggedIn() == false) 
        {
            $this -> redirectToRoute('ROTA_LOGIN');
        }
    }
}