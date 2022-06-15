<?php

require_once 'controllers/BaseController.php';
require_once 'controllers/BaseAuthController.php';
require_once 'models/Linha.php';
require_once 'models/User.php';

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
            $this->redirectToRoute('home/erro'); //TODO: rework pg erro
        } 
        else 
        {
            $this->renderView('fatura/show.php', ['faturaDetails' => $fatura]);
        }
    }

    public function create()
    {
        $users = User::find('all', array('conditions' => array('role = ?', 'cliente')));
        $this->renderView('fatura/create.php', ['users' => $users]);
    }

    public function store()
    {
        $userData = new BaseAuthController();
        //create new resource (activerecord/model) instance with data from POST
        //your form name fields must match the ones of the table fields
        $fatura = new Fatura
        (['data' => $_POST['data'],
         'valor_preco_total' => '0', 
         'valor_iva_total' => '0', 
         'estado' => false,
         'cliente_id' => $_POST['cliente_id'],
         'funcionario_id' => $userData->userData(1),
        ]);


        if($fatura->is_valid())
        {
            $fatura->save();
            $fatura = Fatura::last();
            $this ->redirectToRoute('linha/create&id='.$fatura->id);
        } 
        else 
        {
            $this->renderView('fatura/create.php', ['fatura' => $fatura]);
        }
    }

    public function edit($id)
    {
        
        $fatura = Fatura::find([$id]);
        $users = User::find('all', array('conditions' => array('role = ?', 'cliente')));
        $linhas = Linha::find('all', array('conditions' => array('fatura_id = ?', $fatura->id)));

        if (is_null($fatura)) {
            $this->renderView('ERROR');
        } else {
        
            $this->renderView('fatura/edit.php', ['fatura' => $fatura, 'users' => $users, 'linhas' => $linhas]);
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
            $this->redirectToRoute('fatura/index');
        } else {
            $this->renderView('fatura/edit.php', ['fatura' => $fatura]);
        }
    }

    public function delete($id)
    {
        $fatura = Fatura::find([$id]);
        $fatura->delete();
        
        $this->redirectToRoute('fatura/index');
    }
}