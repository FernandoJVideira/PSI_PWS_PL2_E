<?php

require_once 'controllers/BaseController.php';

class BookController extends BaseController
{
    public function index()
    {
        $books = Book::all();
        
        $this->renderView('book/index.php', ['books' => $books]);
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
        $genre = Genre::all();
        $this->renderView('book/create.php', ['bookDetails' => $book, 'genres' => $genre]);
    }

    public function store()
    {
        //create new resource (activerecord/model) instance with data from POST
        //your form name fields must match the ones of the table fields
        $book = new Book(['name' => $_POST['name'], 'isbn' => $_POST['isbn'], 'genre_id' => $_POST['genre_id']]);
        if($book->is_valid()){
        $book->save();
        $this->redirectIndex();
        } else {
            $this->renderView('book/create.php', ['bookDetails' => $book]);
        }
    }

    public function edit($id)
    {
        $book = Book::find([$id]);
        if (is_null($book)) {
            $this->renderView('ERROR');
        } else {
        //mostrar a vista edit passando os dados por parâmetro
            $genre = Genre::all();
            $this->renderView('book/edit.php', ['bookDetails' => $book, 'genres' => $genre]);
        }
    }

    public function update($id)
    {
        //find resource (activerecord/model) instance where PK = $id
        //your form name fields must match the ones of the table fields
        $book = Book::find([$id]);
        $book->update_attributes(['name' => $_POST['name'], 'isbn' => $_POST['isbn'], 'genre_id' => $_POST['genre_id']]);
        if($book->is_valid()){
        $book->save();
        $this->redirectIndex();
        } else {
            $this->renderView('book/edit.php', ['bookDetails' => $book]);
        }
    }

    public function delete($id)
    {
        $book = Book::find([$id]);
        $book->delete();
        
        $this->redirectIndex();
    }

    private function redirectIndex()
    {
        $this->redirectToRoute('book/index');
    }
}