<?php

require_once 'controllers/BaseController.php';
require_once 'models/LinhaFatura.php';
require_once 'models/Produto.php';
require_once 'models/Fatura.php';

class LinhaFaturaController extends BaseController
{
    public function index()
    {
        $linhaFatura = LinhaFatura::all();

        $this -> renderView('linhaFatura/index.php', ['linhaFatura' => $linhaFatura]);
    }

    public function show($id)
    {
        $linhaFatura = LinhaFatura::find([$id]);
        if (is_null($linhaFatura)) 
        {
            $this->renderView('ERROR'); //TODO: criar pg erro
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

        $linhaFatura = new LinhaFatura
        (['referencia' => $_POST['referencia'],
         'quantidade' => $_POST['descricao'], 
         'valor_uni' => $_POST['preco_unid'], 
         'quant_stock' => $_POST['quant_stock'],
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

    public function edit($id)
    {
        $linhaFatura = LinhaFatura::find([$id]);
        if (is_null($linhaFatura)) {
            $this->renderView('ERROR');
        } else {
        //mostrar a vista edit passando os dados por parâmetro
            $this->renderView('linhaFatura/edit.php', ['linhaFatura' => $linhaFatura]);
        }
    }

    public function update($id)
    {
        //find resource (activerecord/model) instance where PK = $id
        //your form name fields must match the ones of the table fields
        $linhaFatura = LinhaFatura::find([$id]);
        $linhaFatura->update_attributes
        (['quantidade' => $_POST['referencia'],
         'descricao' => $_POST['descricao'], 
         'preco_unid' => $_POST['preco_unid'], 
         'quant_stock' => $_POST['quant_stock'],
        ]);

        if($linhaFatura->is_valid())
        {
            $linhaFatura->save();
            $this->redirectToRoute('linhaFatura/index');
        } else {
            $this->renderView('linhaFatura/edit.php', ['linhaFatura' => $linhaFatura]);
        }
    }

    public function delete($id)
    {
        $linhaFatura = LinhaFatura::find([$id]);
        $linhaFatura->delete();
        
        $this->redirectToRoute('produto/index');
    }
}