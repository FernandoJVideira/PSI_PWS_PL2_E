<?php

require_once 'controllers/BaseController.php';
require_once 'models/Linha.php';
require_once 'models/Produto.php';
require_once 'models/Fatura.php';

class LinhaController extends BaseController
{

    public function create($idFatura)
    {
        $produtos = Produto::all();
        $fatura = Fatura::find([$idFatura]);

        $this->renderView('linha/create.php', ['produtos' => $produtos, 'fatura' => $fatura]);
    }

    public function store($idFatura)
    {
        //create new resource (activerecord/model) instance with data from POST
        //your form name fields must match the ones of the table fields
        $calc = new FaturaController();

        $produto = Produto::find([$_POST['produto_id']]);
        $iva = Iva::find([$produto->iva_id]);

        $valorIvaLinha = $_POST['quantidade'] * $produto->preco_unid * ($iva->percentagem / 100);

        $linha = new Linha([
            'quantidade' => $_POST['quantidade'],
            'produto_id' => $_POST['produto_id'],
            'valor_uni' => $produto->preco_unid,
            'valor_iva' => $valorIvaLinha,
            'fatura_id' => $idFatura,
        ]);

        if ($linha->is_valid()) {
            $linha->save();
            $calc->calcularTotal($idFatura);
            $this->updateStock($_POST['produto_id'], $_POST['quantidade'], '-');
            $this->redirectToRoute('fatura/edit&id=' . $idFatura);
        } else {
            $produtos = Produto::all();
            $fatura = Fatura::find([$idFatura]);
            $this->renderView('linha/create.php', ['linha' => $linha, 'produtos' => $produtos, 'fatura' => $fatura]);
        }
    }

    public function updateStock($id, $quant, $op)
    {
        $produto = Produto::find([$id]);
        if ($op == '+')
            $produto->update_attribute('quant_stock', $produto->quant_stock + $quant);
        else
            $produto->update_attribute('quant_stock', $produto->quant_stock - $quant);
    }

    public function delete($id)
    {
        $linha = Linha::find([$id]);
        $id = $linha->fatura_id;
        $linha->delete();
        $this->updateStock($linha->produto_id, $linha->quantidade, '+');
        $this->redirectToRoute('fatura/edit&id=' . $id);
    }
}
