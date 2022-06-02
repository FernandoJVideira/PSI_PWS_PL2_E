<?php

require_once 'models/Users.php';
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

        $user = Users::find_by_username($username);
        
        if (!$user && $password == $user -> password) {

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
