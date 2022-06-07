<?php

require_once 'controllers/UserController.php';

class Users extends ActiveRecord\Model
{
    static $validates_presence_of = array(
        array('username', 'message' => 'Campo obrigatório!'),
        array('password', 'message' => 'Campo obrigatório!'),
        array('email', 'message' => 'Campo obrigatório!'),
        array('telefone', 'message' => 'Campo obrigatório!'),
        array('nif', 'message' => 'Campo obrigatório!'),
        array('morada', 'message' => 'Campo obrigatório!'),
        array('cod_postal', 'message' => 'Campo obrigatório!'),
        array('localidade', 'message' => 'Campo obrigatório!'),
        array('role', 'message' =>  'Campo obrigatório!')
    );

    static $validates_uniqueness_of = array(
        array('username', 'message' => 'O username inserido já existe!'),
        array('email', 'message' => 'O email inserido já existe!'),
        array('telefone', 'message' => 'O telefone inserido já existe!'),
        array('nif', 'message' => 'O nif inserido já existe!')
    );
}
