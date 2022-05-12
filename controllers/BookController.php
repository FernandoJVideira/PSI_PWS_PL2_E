<?php

require_once 'controllers/BaseController.php';

class BookController extends BaseController
{
    public function index()
    {
        $books = Book::all();

        $this -> renderView('book/index.php', ['books' => $books]);
    }

    public function show($id)
    {
        $book = Book::find([$id]);
        if (is_null($book)) {
            $this->renderView('ERROR'); //Todo criar pg erro
        } else {
            $this->renderView('book/show.php', ['bookDetails' => $book]);
        }
    }

    public function create($book)
    {
        //mostrar a vista create
    }

    public function store()
    {
        //create new resource (activerecord/model) instance with data from POST
        //your form name fields must match the ones of the table fields
        $book = new Book($_POST);
        if($book->is_valid()){
        $book->save();
        //redirecionar para o index
        } else {
        //mostrar vista create passando o modelo como parâmetro
        }
    }

    public function edit($id)
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
            this->renderView('book/edit.php', ['bookDetails' => $book]);
        }
    }

    public function delete($id)
    {
        $book = Book::find([$id]);
        $book->delete();
        
        //redirecionar para o index
    }
}