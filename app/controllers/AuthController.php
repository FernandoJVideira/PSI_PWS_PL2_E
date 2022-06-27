<?php

require_once 'BaseController.php';

class AuthController extends BaseController
{
    public function __construct()
    {
        require_once "models/Auth.php";
    }
    public function authlogin()
    {
        $auth = new Auth();

        if ($auth->isLoggedIn() == true) {
            $this->redirectToRoute();
        }

        if (isset($_POST["username"]) && isset($_POST["password"])) {
            if ($auth->login($_POST["username"], $_POST["password"])) {
                $this->redirectToRoute('home/index');
            } else {
                $this->renderView('auth/index.php', ['erro' => true]);
            }
        } else {
            $this->renderView('auth/index.php');
        }
    }
    public function authlogout()
    {
        $auth = new Auth();
        $auth->logout();
        $this->redirectToRoute();
    }
}
