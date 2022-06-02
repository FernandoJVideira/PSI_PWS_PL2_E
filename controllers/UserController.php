<?php

require_once 'controllers/BaseController.php';

class UserController extends BaseController
{
    public function index()
    {
        $users = Users::all();

        $this -> renderView('user/index.php', ['users' => $users]);
    }

    public function show($id)
    {
        $user = Users::find([$id]);
        if (is_null($user)) {
            $this->renderView('ERROR'); //Todo criar pg erro
        } else {
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
        $user = new Users
        (['username' => $_POST['username'],
         'password' => sha1($_POST['password']), 
         'email' => $_POST['email'], 
         'telefone' => $_POST['telemovel'],
         'nif' => $_POST['nif'],
         'morada' => $_POST['morada'],
         'cod_postal' => $_POST['codPostal'],
         'localidade' => $_POST['localidade'],
         'role' => $_POST['type_user']]);
        
        if($user->is_valid())
        {
        $user->save();


        $this ->redirectToRoute();
        } else {
        //mostrar vista create passando o modelo como parâmetro
        }
    }

    /*public function edit($id)
    {
        $book = Book::find([$id]);
        if (is_null($book)) {
            $this->renderView('ERROR');
        } else {
        //mostrar a vista edit passando os dados por parâmetro
            $this->renderView('book/edit.php', ['bookDetails' => $book]);
        }
    }

    public function update($id)
    {
        //find resource (activerecord/model) instance where PK = $id
        //your form name fields must match the ones of the table fields
        $book = Book::find([$id]);
        $book->update_attributes(['name' => $_POST['name'], 'isbn' => $_POST['isbn']]);
        if($book->is_valid()){
        $book->save();
        $this->index();
        } else {
            $this->renderView('book/edit.php', ['bookDetails' => $book]);
        }
    }

    public function delete($id)
    {
        $book = Book::find([$id]);
        $book->delete();
        
        //redirecionar para o index
    }*/
}