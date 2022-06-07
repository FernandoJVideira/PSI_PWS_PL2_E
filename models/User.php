<?php

class User extends ActiveRecord\Model
{
    static $validate_presence_of = array(
        array('username', 'message' => 'It must be provided'),
        array('password', 'message' => 'It must be provided'),
        array('email', 'message' => 'It must be provided'),
        array('telefone', 'message' => 'It must be provided'),
        array('nif', 'message' => 'It must be provided'),
        array('morada', 'message' => 'It must be provided'),
        array('cod_postal', 'message' => 'It must be provided'),
        array('localidade', 'message' => 'It must be provided'),
    );

    static $validate_size_of = array(
        array('username', 'within' => array(2,10)),
        //array('password', 'minimum' => 8),
        //array('email', 'message' => 'It must be provided'),
        //array('telefone', 'message' => 'It must be provided'),
        //array('nif', 'message' => 'It must be provided'),
        //array('morada', 'message' => 'It must be provided'),
        //array('cod_postal', 'message' => 'It must be provided'),
        //array('localidade', 'message' => 'It must be provided'),
    );
}