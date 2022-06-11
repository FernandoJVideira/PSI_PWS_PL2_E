<?php

require_once 'controllers/BaseController.php';
require_once 'controllers/BaseAuthController.php';
require_once 'models/Auth.php';
require_once 'models/User.php';

class UserController extends BaseController
{
    public function index()
    {
        $base = new BaseAuthController();

        $base->loginFilter();
        $user = null;

        if ($base->userData(2) == 'funcionario') {
            $users = User::find('all', array('conditions' => array('role =?', 'cliente')));
            $user = User::find([$base->userData(1)]);
        } else
            $users = User::all();

        $this->renderView('user/index.php', ['users' => $users, 'user' => $user]);
    }

    public function show($id)
    {
        $user = User::find([$id]);
        if (is_null($user)) {
            $this->renderView('ERROR'); //TODO: criar pg erro
        } else {
            $this->renderView('user/show.php', ['userDetails' => $user]);
        }
    }

    public function create()
    {
        $base = new BaseAuthController();
        $base->loginFilter();

        $this->renderView('user/create.php');
    }

    public function store()
    {
        $base = new BaseAuthController();
        $base->loginFilter();
        //create new resource (activerecord/model) instance with data from POST
        //your form name fields must match the ones of the table fields
        $user = new User([
            'username' => $_POST['username'],
            'password' => ($_POST['password'] != "" ? $_POST['password'] : null),
            'email' => $_POST['email'],
            'telefone' => $_POST['telefone'],
            'nif' => $_POST['nif'],
            'morada' => $_POST['morada'],
            'cod_postal' => $_POST['cod_postal'],
            'localidade' => $_POST['localidade'],
            'role' => isset($_POST['role']) && $_POST['role'] != 'administrador' ? $_POST['role'] : 'cliente'
        ]);

        if ($user->is_valid()) {
            $user->password = sha1($_POST['password']);
            $user->save();
            $this->redirectToRoute('user/index');
        } else {
            $this->renderView('user/create.php', ['users' => $user]);
        }
    }

    public function edit($id)
    {
        $base = new BaseAuthController();
        $base->loginFilter();

        try {
            $user = User::find([$id]);
        } catch (Exception $e) {
            $this->redirectToRoute('home/erro');
        }

        if ($user->role != 'cliente'  && $user->id != $base->userData(1) && $base->userData(2) != 'administrador') {
            $this->redirectToRoute('home/erro');
        }
        //mostrar a vista edit passando os dados por parâmetro
        $this->renderView('user/edit.php', ['user' => $user]);
    }

    public function update($id)
    {
        $base = new BaseAuthController();
        $base ->loginFilter();

        try {
            $user = User::find([$id]);
        } catch (Exception $e) {
            $this->redirectToRoute('user/index');
        }

        if ($user->role != 'cliente'  && $user->id != $base->userData(1) && $base->userData(2) != 'administrador') {
            $this->redirectToRoute('user/index');
        }

        //find resource (activerecord/model) instance where PK = $id
        //your form name fields must match the ones of the table fields

        $user->update_attributes([
            'username' => isset($_POST['username']) ? $_POST['username'] : null,
            'password' => ($_POST['password'] != "" ? $_POST['password'] : null),
            'email' => isset($_POST['email']) ? $_POST['email'] : null,
            'telefone' => isset($_POST['telefone']) ? $_POST['telefone'] : null,
            'nif' => isset($_POST['nif']) ? $_POST['nif'] : null,
            'morada' => isset($_POST['morada']) ? $_POST['morada'] : null,
            'cod_postal' => isset($_POST['cod_postal']) ? $_POST['cod_postal'] : null,
            'localidade' => isset($_POST['localidade']) ? $_POST['localidade'] : null,
            'role' => isset($_POST['role']) && $_POST['role'] != 'administrador' ? $_POST['role'] : $user->role
        ]);
        if ($user->is_valid()) {
            $user->password = sha1($_POST['password']);
            $user->save();
            $this->redirectToRoute('user/index');
        } else {
            $this->renderView('user/edit.php', ['user' => $user]);
        }
    }

    public function delete($id)
    {
        $base = new BaseAuthController();
        $base->loginFilter();
        try {
            $user = User::find([$id]);
        } catch (Exception $e) {
            $this->redirectToRoute('home/erro');
        }
        if ($user->role == 'administrador' || $user->id == $base->userData(1)) {
            $this->redirectToRoute('home/erro');
        }

        $user->delete();

        $this->redirectToRoute('user/index');
    }
}
