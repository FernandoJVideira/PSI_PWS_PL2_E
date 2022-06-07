<?php

require_once 'models/User.php';
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
        $user = User::find_by_username_and_password($username, sha1($password));

        if ($user)
        {
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
