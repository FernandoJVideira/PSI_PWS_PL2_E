<?php

require_once 'controllers/BaseController.php';
require_once 'models/Produto.php';
require_once 'models/Iva.php';

class ProdutoController extends BaseController
{
    public function index()
    {
        $produtos = Produto::all();
        $ivas = Iva::all();

        $this->renderView('produto/index.php', ['produtos' => $produtos, 'ivas' =>  $ivas]);
    }

    public function show($id)
    {
        try {
            $produto = Produto::find([$id]);
        } catch (\Throwable $th) {
            $this->redirectToRoute('produto/index');
        }
        $this->renderView('produto/show.php', ['produto' => $produto]);
    }

    public function create()
    {
        $ivas = Iva::all(array('conditions' => array('em_vigor = ?', '1')));
        $this->renderView('produto/create.php', ['ivas' => $ivas]);
    }

    public function store()
    {
        //create new resource (activerecord/model) instance with data from POST
        //your form name fields must match the ones of the table fields
        $preco = str_replace(',', '.', trim($_POST['preco_unid']));
        $stock = filter_var(trim($_POST['quant_stock']), FILTER_VALIDATE_INT);
        $produto = new Produto([
            'referencia' => trim($_POST['referencia']),
            'descricao' => trim($_POST['descricao']),
            'preco_unid' => $preco,
            'quant_stock' => $stock,
            'iva_id' => trim($_POST['iva_id']),
        ]);
        if ($produto->is_valid()) {
            $produto->save();
            $this->redirectToRoute('produto/index');
        } else {
            $ivas = Iva::all(array('conditions' => array('em_vigor = ?', '1')));
            $this->renderView('produto/create.php', ['produto' => $produto, 'ivas' => $ivas]);
        }
    }

    public function edit($id)
    {
        try {
            $produto = Produto::find([$id]);
        } catch (\Throwable $th) {
            $this->redirectToRoute('produto/index');
        }
        //mostrar a vista edit passando os dados por parâmetro
        $this->renderView('produto/edit.php', ['produto' => $produto]);
    }

    public function update($id)
    {
        //find resource (activerecord/model) instance where PK = $id
        //your form name fields must match the ones of the table fields
        try {
            $produto = Produto::find([$id]);
        } catch (\Throwable $th) {
            $this->redirectToRoute('produto/index');
        }

        $preco = str_replace(',', '.', trim($_POST['preco_unid']));
        $stock = filter_var(trim($_POST['quant_stock']), FILTER_VALIDATE_INT);

        $produto->update_attributes([
            'referencia' => trim($_POST['referencia']),
            'descricao' => trim($_POST['descricao']),
            'preco_unid' => $preco,
            'quant_stock' => $stock,
        ]);

        if ($produto->is_valid()) {
            $produto->save();
            $this->redirectToRoute('produto/index');
        } else {
            $this->renderView('produto/edit.php', ['produto' => $produto]);
        }
    }

    public function delete($id)
    {
        try {
            $produto = Produto::find([$id]);
        } catch (\Throwable $th) {
            $this->redirectToRoute('produto/index');
        }
        try {
            $produto->delete();
        } catch (Exception $e) {
            $this->redirectToRoute('produto/index', ['erro' => $id]);
        }


        $this->redirectToRoute('produto/index');
    }
}
