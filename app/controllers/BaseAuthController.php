<?php

require_once 'BaseController.php';
require_once "models/Auth.php";


class BaseAuthController extends BaseController
{
    public function restricted()
    {
        if ($this->userData(2) == 'cliente')
            $this->redirectToRoute('home/erro');
    }

    /** 
     * Devolve os dados armazenados na $_SESSION['login']
     * @param $field int position of the array
     * @return string [0] nome
     * @return int [1] id
     * @return string [2] role
     */

    public function userData($field)
    {
        $auth = new Auth();
        return $_SESSION['login'][$field];
    }
}
