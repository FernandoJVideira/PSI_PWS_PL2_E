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
        $user = null;
        $base->restricted();

        if ($base->userData(2) == 'funcionario') {
            $users = User::find('all', array('conditions' => array('role =?', 'cliente')));
            $user = User::find([$base->userData(1)]);
        } else
            $users = User::all();

        $this->renderView('user/index.php', ['users' => $users, 'user' => $user]);
    }

    public function show($id)
    {
        $base = new BaseAuthController();
        $base->restricted();

        $user = User::find([$id]);
        if (is_null($user)) {
            $this->redirectToRoute('user/index');
        } else {
            $this->renderView('user/show.php', ['userDetails' => $user]);
        }
    }

    public function create()
    {
        $base = new BaseAuthController();
        $base->restricted();
        $this->renderView('user/create.php');
    }


    public function store()
    {
        $base = new BaseAuthController();
        $base->restricted();

        if ($_POST == null)
            $this->redirectToRoute('user/create');

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
            var_dump($user);
            $user->update_attribute('password', sha1($_POST['password']));
            $user->save();
            $this->redirectToRoute('user/index');
        } else {
            $this->renderView('user/create.php', ['users' => $user]);
        }
    }

    public function edit($id)
    {
        $base = new BaseAuthController();
        $base->restricted();
        if (!isset($id))
            $this->redirectToRoute('user/index');

        try {
            $user = User::find([$id]);
        } catch (Exception $e) {
            $this->redirectToRoute('home/erro');
        }

        if (($user->id != $base->userData(1) && $base->userData(2) != 'administrador') && $user->role != 'cliente') {
            $this->redirectToRoute('home/erro');
        }
        //mostrar a vista edit passando os dados por parâmetro
        if ($base->userData(2) != 'administrador') {
            $this->renderView('user/editFunc.php', ['user' => $user]);
            return;
        }

        $this->renderView('user/editAdmin.php', ['user' => $user]);
    }

    public function update($id)
    {
        $base = new BaseAuthController();
        $base->restricted();

        try {
            $user = User::find([$id]);
        } catch (Exception $e) {
            $this->redirectToRoute('user/index');
        }

        if (($user->id != $base->userData(1) && $base->userData(2) != 'administrador') && $user->role != 'cliente') {
            $this->redirectToRoute('home/erro');
        }

        //find resource (activerecord/model) instance where PK = $id
        //your form name fields must match the ones of the table fields
        foreach ($_POST as $field) {
            $key = array_search($field, $_POST);
            if ($_POST[$key] != "") {
                $user->update_attribute($key, $_POST[$key]);
            }
        }

        if ($user->is_valid()) {
            if (isset($_POST['password']))
                $user->update_attribute('password', sha1($_POST['password']));
            $user->save();
            $this->redirectToRoute('user/index');
        } else {

            if ($base->userData(2) != 'administrador') {
                $this->renderView('user/editFunc.php', ['user' => $user]);
                return;
            }

            $this->renderView('user/editAdmin.php', ['user' => $user]);
        }
    }

    public function delete($id)
    {
        $base = new BaseAuthController();
        $base->restricted();

        if (!isset($id))
            $this->redirectToRoute('user/index');
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
