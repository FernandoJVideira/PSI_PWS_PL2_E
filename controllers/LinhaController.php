<?php

require_once 'controllers/BaseController.php';
require_once 'models/Linha.php';
require_once 'models/Produto.php';
require_once 'models/Fatura.php';

class LinhaController extends BaseController
{
    public function index()
    {
        $linhas = Linha::all();

        $this -> renderView('linha/index.php', ['linhas' => $linhas]);
    }

    public function show($id)
    {
        $linha = Linha::find([$id]);
        if (is_null($linha)) 
        {
            $this->renderView('home/erro'); //TODO: rework pg erro
        } 
        else 
        {
            $this->renderView('linha/show.php', ['linha' => $linha]);
        }
    }

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

        $produto = Produto::find([$_POST['produto_id']]);
        $iva = Iva::find([$produto->iva_id]);

        $valorIvaLinha = $_POST['quantidade'] * $produto->preco_unid * ($iva->percentagem / 100);

        $linha = new Linha
        (['quantidade' => $_POST['quantidade'], 
         'produto_id' => $_POST['produto_id'],
         'valor_uni' => $produto->preco_unid,
         'valor_iva' => $valorIvaLinha,
         'fatura_id' => $idFatura,
        ]);
        
        if($linha->is_valid())
        {
            $linha->save();
            $this ->redirectToRoute('fatura/edit&id='.$idFatura);

        } 
        else 
        {
            $this->renderView('linha/create.php', ['linha' => $linha]);
        }
    }

    public function delete($id)
    {
        $linha = Linha::find([$id]);
        $linha->delete();
        
        $this->redirectToRoute('linha/index');
    }
}