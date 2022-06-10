<?php

class Iva extends ActiveRecord\Model
{
    static $validates_presence_of = array(
        array('percentagem', 'message' => 'Campo obrigatório!'),
        array('descricao', 'message' => 'Campo obrigatório!'),
        array('em_vigor', 'message' => 'Campo obrigatório!')
    );

     /* static $validates_format_of = array(
     array('percentagem', 'without' => '/^[a-zA-Z]+$/') ); */

    static $validates_numericality_of = array(
        array(
            'percentagem', 'less_than_or_equal_to' => 100, 'greater_than_or_equal_to' => 0,
            'message' => 'tem que ser um número entre 0 e 100!',
        ),
        array(
            'percentagem', 'only_integer' => true,
            'message' => 'tem que ser um número inteiro de 0 a 100!'
        )
    );

    static $validates_uniqueness_of = array(
        array('percentagem', 'message' => 'já existe na tabela!')
    );
}
