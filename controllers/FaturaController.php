<?php

require_once 'controllers/BaseController.php';

class FaturaController extends BaseController
{
    public function index()
    {
        $fatura = Fatura::all();

        $this -> renderView('fatura/index.php', ['fatura' => $fatura]);
    }

    public function show($id)
    {
        $fatura = Fatura::find([$id]);
        if (is_null($fatura)) 
        {
            $this->renderView('ERROR'); //TODO: criar pg erro
        } 
        else 
        {
            $this->renderView('fatura/show.php', ['faturaDetails' => $fatura]);
        }
    }

    public function create()
    {
        $this->renderView('fatura/create.php');
    }

    public function store()
    {
        //create new resource (activerecord/model) instance with data from POST
        //your form name fields must match the ones of the table fields
        $fatura = new Fatura
        (['data' => $_POST['data'],
         'valor_preco_atual' => sha1($_POST['valor_preco_atual']), 
         'valor_iva_total' => $_POST['valor_iva_total'], 
         'estado' => $_POST['estado'],
        ]);
        
        if($fatura->is_valid())
        {
            $fatura->save();
            $this ->redirectToRoute();

        } 
        else 
        {
            $this->renderView('user/create.php', ['fatura' => $fatura]);
        }
    }

    public function edit($id)
    {
        $fatura = Fatura::find([$id]);
        if (is_null($fatura)) {
            $this->renderView('ERROR');
        } else {
        //mostrar a vista edit passando os dados por parâmetro
            $this->renderView('fatura/edit.php', ['faturaDetails' => $fatura]);
        }
    }

    public function update($id)
    {
        //find resource (activerecord/model) instance where PK = $id
        //your form name fields must match the ones of the table fields
        $fatura = Fatura::find([$id]);
        $fatura->update_attributes
        (['data' => $_POST['data'],
        'valor_preco_atual' => sha1($_POST['valor_preco_atual']), 
        'valor_iva_total' => $_POST['valor_iva_total'], 
        'estado' => $_POST['estado'],
       ]);

        if($fatura->is_valid())
        {
            $fatura->save();
            $this->redirectToRoute('user/index');
        } else {
            $this->renderView('book/edit.php', ['faturaDetails' => $fatura]);
        }
    }

    public function delete($id)
    {
        $fatura = Fatura::find([$id]);
        $fatura->delete();
        
        $this->redirectToRoute('user/index');
    }
}