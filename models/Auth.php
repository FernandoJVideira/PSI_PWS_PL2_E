<?php

class Auth
{
    public function __construct()
    {
        if(!isset($_SESSION))
        {
            session_start();
        }
    }
    public function login($username, $password)
    {
        if ($username == 'fernando' && $password == '123') {
            $_SESSION['login'] = $username;
            return true;
        }
        return false;
    }

    public function isLoggedIn()
    {
        return isset($_SESSION['login']);
    }

    public function logout()
    {
        session_destroy();
    }
}
