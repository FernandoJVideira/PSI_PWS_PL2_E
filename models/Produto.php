<?php

class Produto extends ActiveRecord\Model
{
    static $validates_presence_of = array(
        array('referencia', 'message' => 'It must be provided'),
        array('descricao', 'message' => 'It must be provided'),
        array('preco_unid', 'message' => 'It must be provided'),
    );

    static $validates_size_of = array(
        array('referencia', 'within' => array(5, 12)),
        array('descricao', 'within' => array(3, 120)),
    );
}
