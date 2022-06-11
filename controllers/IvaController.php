<?php

require_once 'controllers/BaseController.php';
require_once 'models/Auth.php';
require_once 'models/Iva.php';

class IvaController extends BaseController
{
    public function index()
    {
        $ivas = Iva::all();

        $this->renderView('iva/index.php', ['ivas' => $ivas]);
    }

    public function show($id)
    {
        $iva = Iva::find([$id]);
        if (is_null($iva)) {
            $this->renderView('ERROR'); //TODO: criar pg erro
        } else {
            $this->renderView('iva/show.php', ['ivaDetails' => $iva]);
        }
    }

    public function create()
    {
        $this->renderView('iva/create.php');
    }

    public function store()
    {
        //create new resource (activerecord/model) instance with data from POST
        //your form name fields must match the ones of the table fields

        $em_vigor = filter_var($_POST['em_vigor'], FILTER_VALIDATE_BOOLEAN);
        $percentagem = str_replace(',','.',$_POST['percentagem']);
        $iva = new Iva([
            'percentagem' => $percentagem,
            'descricao' => $_POST['descricao'],
            'em_vigor' => $em_vigor
        ]);
        if ($iva->is_valid()) {
            $iva->save();
            $this->redirectToRoute('iva/index');
        } else {
            $this->renderView('iva/create.php', ['iva' => $iva]);
        }
    }

    public function edit($id)
    {
        $iva = Iva::find([$id]);
        if (is_null($iva)) {
            $this->renderView('ERROR');
        } else {
            //mostrar a vista edit passando os dados por parâmetro
            $this->renderView('iva/edit.php', ['iva' => $iva]);
        }
    }

    public function update($id)
    {
        //find resource (activerecord/model) instance where PK = $id
        //your form name fields must match the ones of the table fields
        $em_vigor = filter_var($_POST['em_vigor'], FILTER_VALIDATE_BOOLEAN);

        $iva = Iva::find([$id]);
        $iva->update_attributes([
            'percentagem' => $_POST['percentagem'],
            'descricao' => $_POST['descricao'],
            'em_vigor' => $em_vigor
        ]);
        if ($iva->is_valid()) {
            $iva->save();
            $this->redirectToRoute('iva/index');
        } else {
            $this->renderView('iva/edit.php', ['iva' => $iva]);
        }
    }

    public function delete($id)
    {
        $iva = Iva::find([$id]);
        $iva->delete();

        $this->redirectToRoute('iva/index');
    }
}
