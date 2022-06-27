<?php

require_once 'controllers/BaseController.php';
require_once 'controllers/BaseAuthController.php';
require_once 'models/Empresa.php';

class EmpresaController extends BaseController
{
    public function index()
    {
        $base = new BaseAuthController();
        
        if ($base->userData(2) != 'cliente') {
            
            $empresas = Empresa::all();
        }

        $this->renderView('empresa/index.php', ['empresas' => $empresas]);
        }

    public function edit($id)
    {
        $base = new BaseAuthController();
        $base->restricted();
        try {
            $empresa = Empresa::find([$id]);
        } catch (\Throwable $th) {
            $this->redirectToRoute('empresa/index');
        }
            
        $this->renderView('empresa/edit.php', ['empresa' => $empresa]);

    }

    public function update($id)
    {
        $base = new BaseAuthController();
        $base->restricted();
        //find resource (activerecord/model) instance where PK = $id
        //your form name fields must match the ones of the table fields
        $empresa = Empresa::find([$id]);

        $params = array();

        foreach ($_POST as $field) {
            $key = array_search($field, $_POST);
            if (trim($_POST[$key]) != "") {
                $params[$key] = trim($_POST[$key]);
            }
        }

        $empresa->update_attributes($params);

        if ($empresa->is_valid()) {
            $empresa->save();
            
            $this->redirectToRoute('empresa/index');
        } else {
            $this->renderView('empresa/edit.php', ['empresa' => $empresa]);
        }
    }
}
