<?php

class Produto extends ActiveRecord\Model
{
    static $validates_presence_of = array(
        array('referencia', 'message' => 'Campo obrigatório!'),
        array('descricao', 'message' => 'Campo obrigatório!'),
        array('preco_unid', 'message' => 'Campo obrigatório!'),
        array('quant_stock', 'message' => 'Campo obrigatório!'),
        array('iva_id', 'message' => 'Campo obrigatório!')
    );

    static $validates_uniqueness_of = array(
        array('referencia', 'message' => 'A referencia inserida já existe!'),
    );
    static $validates_numericality_of = array(
        array('quant_stock', 'greater_than_or_equal_to' => 0, 'message' => 'Formato incorreto!'),
        array('preco_unid', 'greater_than' => 0, 'message' => 'Formato incorreto!'),
    );

    static $validates_size_of = array(
        array('referencia', 'within' => array(5, 12)),
        array('descricao', 'within' => array(3, 120)),
    );
}
