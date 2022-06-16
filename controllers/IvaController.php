<?php

require_once 'controllers/BaseController.php';
require_once 'models/Auth.php';
require_once 'models/Iva.php';

class IvaController extends BaseController
{
    public function index()
    {
        $this->restricted();
        $ivas = Iva::all();
        $this->renderView('iva/index.php', ['ivas' => $ivas]);
    }

    public function create()
    {
        $this->restricted();

        $this->renderView('iva/create.php');
    }

    public function store()
    {
        $this->restricted();

        if (trim($_POST['percentagem']) == null)
            $this->redirectToRoute('iva/create');
        //create new resource (activerecord/model) instance with data from POST
        //your form name fields must match the ones of the table fields

        $em_vigor = filter_var($_POST['em_vigor'], FILTER_VALIDATE_BOOLEAN);
        $percentagem = str_replace(',', '.', trim($_POST['percentagem']));
        $iva = new Iva([
            'percentagem' => $percentagem,
            'descricao' => trim($_POST['descricao']),
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
        $this->restricted();

        try {
            $iva = Iva::find([$id]);
        } catch (Exception $e) {
            $this->redirectToRoute('iva/index');
        }
        //mostrar a vista edit passando os dados por parâmetro
        $this->renderView('iva/edit.php', ['iva' => $iva]);
    }

    public function update($id)
    {
        $this->restricted();

        try {
            $iva = Iva::find([$id]);
        } catch (Exception $e) {
            $this->redirectToRoute('iva/index');
        }

        $em_vigor = filter_var($_POST['em_vigor'], FILTER_VALIDATE_BOOLEAN);
        $percentagem = str_replace(',', '.', trim($_POST['percentagem']));
        $iva->update_attributes([
            'percentagem' => $percentagem,
            'descricao' => trim($_POST['descricao']),
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
        $this->restricted();

        try {
            $iva = Iva::find([$id]);
        } catch (Exception $e) {
            $this->redirectToRoute('iva/index');
        }

        try {
            $iva->delete();
        } catch (Exception $e) {
            $this->redirectToRoute('iva/index', ['erro' => true]);
        }
        $this->redirectToRoute('iva/index');
    }

    private function restricted()
    {
        $base = new BaseAuthController();
        $base->restricted();
    }
}
