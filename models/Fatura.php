<?php

class Fatura extends ActiveRecord\Model
{
    static $validate_presence_of = array(
        array('data', 'message' => 'It must be provided'),
        array('valor_preco_total', 'message' => 'It must be provided'),
        array('valor_preco_total', 'message' => 'It must be provided'),
        array('estado', 'message' => 'It must be provided')
    );
}