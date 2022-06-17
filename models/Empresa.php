<?php

class Empresa extends ActiveRecord\Model
{
    static $validates_presence_of = array(
        array('nome', 'message' => 'Campo obrigatório!'),
        array('email', 'message' => 'Campo obrigatório!'),
        array('telefone', 'message' => 'Campo obrigatório!'),
        array('nif', 'message' => 'Campo obrigatório!'),
        array('morada', 'message' => 'Campo obrigatório!'),
        array('cod_postal', 'message' => 'Campo obrigatório!'),
        array('localidade', 'message' => 'Campo obrigatório!'),
        array('capital_social', 'message' => 'Campo obrigatório!'),
    );

    static $validates_uniqueness_of = array(
        array('nome', 'message' => 'A empresa inserida já existe!'),
        array('email', 'message' => 'O email inserido já existe!'),
        array('telefone', 'message' => 'O telefone inserido já existe!'),
        array('nif', 'message' => 'O nif inserido já existe!')
    );

    static $validates_size_of = array(
        array('nome', 'within' => array(3, 50), 'message' => 'O nome da empresa requer 3 a 50 caracteres!'),
        array('telefone', 'minimum' => 9, 'message' => 'Minimo de 9 digitos!'),
        array('nif', 'is' => 9, 'message' => 'O NIF requer 9 digitos!'),
        array('morada', 'minimum' => 3, 'message' => 'Minimo de 3 caracteres!')
    );
    static $validates_numericality_of = array(
        array('telefone', 'only_integer' => true, 'message' => 'Formato incorreto!'),
        array('nif', 'only_integer' => true, 'message' => 'Formato incorreto!'),
        array('capital_social', 'greater_than' => 0.01, 'message' => 'Formato incorreto!'),
    );

    static $validates_format_of = array(
        array('email', 'with' => '/^[^0-9][A-z0-9_]+([.][A-z0-9_]+)*[@][A-z0-9_]+([.][A-z0-9_]+)*[.][A-z]{2,5}$/', 'message' => 'Formato incorreto!'),
        array('cod_postal', 'with' => '/^[0-9]{4}(?:-[0-9]{3})?$/', 'message' => 'Formato incorreto!')
    );
}
