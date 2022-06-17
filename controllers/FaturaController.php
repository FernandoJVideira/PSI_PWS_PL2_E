<?php

require_once 'controllers/BaseController.php';
require_once 'controllers/BaseAuthController.php';
require_once 'models/Fatura.php';
require_once 'models/Empresa.php';
require_once 'models/Linha.php';
require_once 'models/User.php';
require_once 'models/Iva.php';

class FaturaController extends BaseController
{
    public function index()
    {
        $base = new BaseAuthController();

        if ($base->userData(2) == 'cliente') {
            $fatura = Fatura::find('all', array("conditions" => array("cliente_id = ?", $base->userData(1))));
            $users = User::all();
        } else {
            $fatura = Fatura::all();
            $users = User::all();
        }

        $this->renderView('fatura/index.php', ['faturas' => $fatura, 'users' => $users]);
    }

    public function show($id)
    {
        $fatura = Fatura::find([$id]);
        $cliente = User::find([$fatura->cliente_id]);
        $funcionario = User::find([$fatura->funcionario_id]);
        $produto = Produto::all();
        $iva = Iva::all();
        $empresa = Empresa::first();
        $linhas = Linha::all(array("conditions" => array("fatura_id = ?", $id)));

        if (is_null($fatura)) {
            $this->redirectToRoute('home/erro'); //TODO: rework pg erro
        } else {
            $this->renderView('fatura/print.php', ['fatura' => $fatura, 'empresa' => $empresa, 'produto' => $produto, 'linhas' => $linhas, 'funcionario' => $funcionario, 'cliente' => $cliente, 'iva' => $iva]);
        }
    }

    public function done($id)
    {
        $base = new BaseAuthController();
        $base->restricted();

        $fatura = Fatura::find([$id]);
        $linhas = Linha::find(array('conditions' => array('fatura_id = ?', $id)));
        if ($linhas == null)
            $this->redirectToRoute('fatura/index');
        $fatura->update_attribute('estado', 1);
        $this->redirectToRoute('fatura/index');
    }

    public function create()
    {
        $base = new BaseAuthController();
        $base->restricted();

        if (isset($_POST['nome_cliente']))
            $users = User::find('all', array('conditions' => "role = 'cliente' AND username LIKE '%" . trim($_POST['nome_cliente']) . "%'"));
        else
            $users = User::find('all', array('conditions' => array('role = ?', 'cliente')));

        $this->renderView('fatura/clienteFind.php', ['users' => $users]);
    }

    public function store($id)
    {
        $base = new BaseAuthController();
        $base->restricted();

        try {
            $user = User::find([$id]);
        } catch (\Throwable $th) {
            $users = User::find(['all', array('conditions' => array('role = ?', 'cliente'))]);
            $this->renderView('fatura/create.php', ['users' => $users]);
        }

        //create new resource (activerecord/model) instance with data from POST
        //your form name fields must match the ones of the table fields
        $fatura = new Fatura([
            'data' => date("d-m-Y"),
            'valor_preco_total' => '0',
            'valor_iva_total' => '0',
            'estado' => false,
            'cliente_id' => $id,
            'funcionario_id' => $base->userData(1),
        ]);


        if ($fatura->is_valid()) {
            $fatura->save();
            $fatura = Fatura::last();
            $this->redirectToRoute('fatura/edit', ['id' => $fatura->id]);
        } else {
            $users = User::find(['all', array('conditions' => array('role = ?', 'cliente'))]);
            $this->renderView('fatura/create.php', ['users' => $users]);
        }
    }

    public function calcularTotal($id)
    {
        $linhas = Linha::find('all', array("conditions" => array("fatura_id = ?", $id)));
        $total_preco = 0;
        $total_iva = 0;
        foreach ($linhas as $linha) {
            $total_preco += ($linha->valor_uni * $linha->quantidade);
            $total_iva += $linha->valor_iva;
        }
        $fatura = Fatura::find([$id]);
        $fatura->update_attribute('valor_preco_total', $total_preco);
        $fatura->update_attribute('valor_iva_total', $total_iva);
        $fatura->save();
    }

    public function edit($id)
    {
        $base = new BaseAuthController();
        $base->restricted();
        try {
            $fatura = Fatura::find([$id]);
        } catch (\Throwable $th) {
            $this->redirectToRoute('fatura/index');
        }

        $user = User::find(array('conditions' => array('id = ?', $fatura->cliente_id)));
        $linhas = Linha::find('all', array('conditions' => array('fatura_id = ?', $fatura->id)));
        $empresa = Empresa::first();
        $produtos = Produto::all();

        $this->calcularTotal($fatura->id);
        $this->renderView('fatura/edit.php', ['fatura' => $fatura, 'user' => $user, 'linhas' => $linhas, 'produtos' => $produtos, 'empresa' => $empresa]);
    }

    public function update($id)
    {
        $base = new BaseAuthController();
        $base->restricted();
        //find resource (activerecord/model) instance where PK = $id
        //your form name fields must match the ones of the table fields
        $fatura = Fatura::find([$id]);

        $params = array();

        foreach ($_POST as $field) {
            $key = array_search($field, $_POST);
            if (trim($_POST[$key]) != "") {
                $params[$key] = trim($_POST[$key]);
            }
        }

        $fatura->update_attributes($params);

        if ($fatura->is_valid()) {
            $fatura->save();
            $this->calcularTotal($fatura->id);
            $this->redirectToRoute('fatura/index');
        } else {
            try {
                $fatura = Fatura::find([$id]);
            } catch (\Throwable $th) {
                $this->redirectToRoute('fatura/index');
            }
            $users = User::find('all', array('conditions' => array('role = ?', 'cliente')));
            $linhas = Linha::find('all', array('conditions' => array('fatura_id = ?', $fatura->id)));
            $produto = Produto::all();
            $this->calcularTotal($fatura->id);
            $this->renderView('fatura/edit.php', ['fatura' => $fatura, 'users' => $users, 'linhas' => $linhas, 'produtos' => $produto]);
        }
    }

    public function delete($id)
    {
        $base = new BaseAuthController();
        $base->restricted();

        $fatura = Fatura::find([$id]);
        try {
            $fatura->delete();
        } catch (Exception $e) {
            $this->redirectToRoute('fatura/index', ['erro' => true]);
        }

        $this->redirectToRoute('fatura/index');
    }
}
