<?php

require_once "models/Book.php";

class BookController extends BaseController
{
    public function index()
    {
        $books = Book::all();
        //mostrar a vista index passando os dados por parâmetro

        $this -> renderView('book/index.php', ['books' => $books]);
    }
}