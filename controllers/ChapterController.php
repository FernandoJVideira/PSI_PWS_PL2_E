<?php

require_once 'controllers/BaseController.php';
require_once 'controllers/BookController.php';

class ChapterController extends BaseController
{
    public function index($id){
        
        $book = Book::find([$id]);
        $this->renderView('chapters/index.php', ['book'=>$book]);
    }

    public function create($id)
    {
        $this->renderView('chapters/create.php', ['id' => $id]);
    }

    public function store()
    {
        $chapter = new Chapter(['name' => $_POST['name'], 'book_id' => $_POST['book_id']]);
        if($chapter->is_valid()){
            $chapter->save();
            $this->redirectToRoute('chapter/index',['id'=>$chapter->book_id]);
        } else {
            $this->renderView('chapter/create.php', ['chapter'=>$chapter]);
        }
    }

    public function edit($id)
    {
        $chapter = Chapter::find([$id]);
        if (is_null($chapter)) {
            $this->renderView('ERROR');
        } else {
        //mostrar a vista edit passando os dados por parâmetro
            $this->renderView('chapter/edit.php', ['chapter' => $chapter]);
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
        $this->redirectToRoute('chapter/index');
    }
}