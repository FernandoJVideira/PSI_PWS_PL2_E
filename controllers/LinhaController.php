<?php

require_once 'controllers/BaseController.php';
require_once 'models/Linha.php';
require_once 'models/Produto.php';
require_once 'models/Fatura.php';

class LinhaFaturaController extends BaseController
{
    public function index()
    {
        $linhaFatura = Linha::all();

        $this -> renderView('linhaFatura/index.php', ['linhaFatura' => $linhaFatura]);
    }

    public function show($id)
    {
        $linhaFatura = Linha::find([$id]);
        if (is_null($linhaFatura)) 
        {
            $this->renderView('home/erro'); //TODO: rework pg erro
        } 
        else 
        {
            $this->renderView('linhaFatura/show.php', ['linhaFatura' => $linhaFatura]);
        }
    }

    public function create()
    {
        $this->renderView('linhaFatura/create.php');
    }

    public function store()
    {
        //create new resource (activerecord/model) instance with data from POST
        //your form name fields must match the ones of the table fields
        $prodRef = $_POST['referencia'];
        $prodID = Produto::find_by_referencia($prodRef);

        $linhaFatura = new Linha
        (['referencia' => $_POST['referencia'],
         'quantidade' => $_POST['descricao'], 
         'prod_id' => $prodID
        ]);
        
        if($linhaFatura->is_valid())
        {
            $linhaFatura->save();
            $this ->redirectToRoute();

        } 
        else 
        {
            $this->renderView('linhaFatura/create.php', ['linhaFatura' => $linhaFatura]);
        }
    }

    public function delete($id)
    {
        $linhaFatura = Linha::find([$id]);
        $linhaFatura->delete();
        
        $this->redirectToRoute('produto/index');
    }
}