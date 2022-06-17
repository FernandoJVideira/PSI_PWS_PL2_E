<?php

class Fatura extends ActiveRecord\Model
{
    public function validate()
    {
        $user = User::find(array("conditions" => array("role = 'cliente' AND id = ?", $this->cliente_id)));
        if ($user == null)
            $this->errors->add('cliente_id', "O utilizador escolhido não é cliente!");
    }

    static $validates_presence_of = array(
        array('cliente_id', 'message' => 'Campo obrigatório!'),
        array('data', 'message' => 'Campo obrigatório!'),
        array('valor_preco_total', 'message' => 'Campo obrigatório!'),
        array('valor_preco_total', 'message' => 'Campo obrigatório!'),
        array('estado', 'message' => 'Campo obrigatório!')
    );

    static $has_many = array(
        array('linhas')
    );
}
