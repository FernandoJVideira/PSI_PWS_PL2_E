<?php

require_once 'controllers/BaseController.php';
require_once 'models/Linha.php';
require_once 'models/Produto.php';
require_once 'models/Fatura.php';
require_once 'models/Iva.php';

class LinhaController extends BaseController
{

    public function create($idFatura, $idProduto)
    {
        $this->restricted();

        $fatura = Fatura::find([$idFatura]);
        if ($idProduto != null) {
            $produto = Produto::find([$idProduto]);
            $this->renderView('linha/create.php', ['fatura' => $fatura, 'produto' => $produto]);
        } else
            $this->renderView('linha/create.php', ['fatura' => $fatura]);
    }

    public function pesquisa($id)
    {
        if ($_POST == null) {
            $produtos = Produto::all();
            $ivas = Iva::all();
            $this->renderView('linha/produtoFind.php', ['id' => $id, 'produtos' => $produtos, 'ivas' => $ivas]);
        } else {
            $ivas = Iva::all();
            $produtos = Produto::find('all', array('conditions' => "referencia LIKE '%" . trim($_POST['referencia']) . "%'"));
            $this->renderView('linha/produtoFind.php', ['id' => $id, 'produtos' => $produtos, 'ivas' => $ivas]);
        }
    }

    public function store($idFatura)
    {
        $this->restricted();

        try {
            $fatura = Fatura::find([$idFatura]);
        } catch (\Throwable $th) {
            $this->redirectToRoute('fatura/index');
        }

        if ($_POST == null)
            $this->redirectToRoute('fatura/edit', ['id' => $idFatura]);

        //create new resource (activerecord/model) instance with data from POST
        //your form name fields must match the ones of the table fields
        $calc = new FaturaController();
        $produto = Produto::find(array('conditions' => array('referencia =?', trim($_POST['referencia']))));
        if ($produto == null) {
            $this->redirectToRoute('linha/create', ['id' => $fatura->id, 'erro' => true]);
        }

        $iva = Iva::find([$produto->iva_id]);

        $valorIvaLinha = $_POST['quantidade'] * $produto->preco_unid * ($iva->percentagem / 100);

        $linha = new Linha([
            'quantidade' => $_POST['quantidade'],
            'produto_id' => $produto->id,
            'valor_uni' => $produto->preco_unid,
            'valor_iva' => $valorIvaLinha,
            'fatura_id' => $idFatura,
        ]);
        if ($linha->is_valid()) {
            $linha->save();
            $calc->calcularTotal($idFatura);
            $this->updateStock($produto->id, $_POST['quantidade'], '-');
            $this->redirectToRoute('fatura/edit', ['id' => $idFatura]);
        } else {
            $this->renderView('linha/create.php', ['linha' => $linha, 'fatura' => $fatura, 'produto' => $produto]);
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
        $this->restricted();

        $linha = Linha::find([$id]);
        $id = $linha->fatura_id;
        $linha->delete();
        $this->updateStock($linha->produto_id, $linha->quantidade, '+');
        $this->redirectToRoute('fatura/edit', ['id' => $id]);
    }

    private function restricted()
    {
        $base = new BaseAuthController();
        $base->restricted();
    }
}
