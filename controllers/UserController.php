<?php

require_once 'controllers/BaseController.php';
require_once 'models/Auth.php';

class UserController extends BaseController
{
    public function index()
    {
        $users = User::all();

        $this -> renderView('user/index.php', ['users' => $users]);
    }

    public function show($id)
    {
        $user = User::find([$id]);
        if (is_null($user)) 
        {
            $this->renderView('ERROR'); //TODO: criar pg erro
        }
        else
        {
            $this->renderView('user/show.php', ['userDetails' => $user]);
        }
    }

    public function create()
    {
        $this->renderView('user/create.php');
    }

    public function store()
    {
        //create new resource (activerecord/model) instance with data from POST
        //your form name fields must match the ones of the table fields
        $user = new User
        (['username' => $_POST['username'],
          'password' => ($_POST['password'] != "" ? sha1($_POST['password']) : null),
         'email' => $_POST['email'],
         'telefone' => $_POST['telefone'],
         'nif' => $_POST['nif'],
         'morada' => $_POST['morada'],
         'cod_postal' => $_POST['cod_postal'],
         'localidade' => $_POST['localidade'],
         'role' => isset($_POST['role']) ? $_POST['role'] : null
        ]);

        if($user->is_valid())
        {

        }
        else
        {
            $this->renderView('user/create.php', ['user' => $user]);
        }
    }

    public function edit($id)
    {
        $user = User::find([$id]);
        if (is_null($user)) {
            $this->renderView('ERROR');
        } else {
        //mostrar a vista edit passando os dados por parâmetro
            $this->renderView('user/edit.php', ['userDetails' => $user]);
        }
    }

    public function update($id)
    {
        //find resource (activerecord/model) instance where PK = $id
        //your form name fields must match the ones of the table fields
        $user = User::find([$id]);
        $user->update_attributes
        (['username' => $_POST['username'],
        'password' => ($_POST['password'] != "" ? sha1($_POST['password']) : null),
        'email' => $_POST['email'],
        'telefone' => $_POST['telefone'],
        'nif' => $_POST['nif'],
        'morada' => $_POST['morada'],
        'cod_postal' => $_POST['cod_postal'],
        'localidade' => $_POST['localidade'],
        'role' => isset($_POST['role']) ? $_POST['role'] : null
       ]);
        if($user->is_valid()){
        $user->save();
        $this->redirectToRoute('user/index');
        } else {
            $this->renderView('user/edit.php', ['userDetails' => $user]);
        }
    }

    public function delete($id)
    {
        $user = User::find([$id]);
        $user->delete();

        $this->redirectToRoute('user/index');
    }
}
