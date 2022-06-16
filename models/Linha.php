<?php

require_once 'models/Produto.php';

class Linha extends ActiveRecord\Model
{
    static $validates_presence_of = array(
        array('quantidade', 'message' => 'It must be provided'),
    );

    static $validates_numericality_of = array(
        array('quantidade', 'greater_than' => 0),
    );
    static $has_one = array(
        array('produto')
    );

    public function validate()
    {
        $linha = Linha::find('all', array("conditions" => array("fatura_id = ? AND produto_id = ?", $this->fatura_id, $this->produto_id)));
        if ($linha != null)
            $this->errors->add('produto_id', "Produto já inserido na fatura");
        $produto = Produto::find([$this->produto_id]);
        if (($produto->quant_stock - $this->quantidade) < 0)
            $this->errors->add('quantidade', "Quantidade superior à em stock");
    }
}
