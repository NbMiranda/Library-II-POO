<?php
session_start();
require_once("../models/Books.php");

class BooksController {
    protected $post;
    protected $img;

    //Setters
    public function setPost($post) {
        $this->post = $post;
    }
    public function setImg($img){
        $this->img = $img;
    }
    //Getters
    public function getPost() {
        return $this->post;
    }
    public function getImg(){
        return $this->img;
    }
    //Metodos
    public function register(){
        //getting the uploaded FILE post
        $img = $this->getImg();
         
        if (isset($img['image']) && !empty($img['image'])) {
            $target = $_SERVER['DOCUMENT_ROOT']."/assets/imgs/BookCover/".basename($img['image']['name']);
            move_uploaded_file($img['image']['tmp_name'], $target);
        }
        //setting
        $books = new Books;
        $postResult = $this->getPost();

        $books->setBookName($postResult['bookName']);
        $books->setWriterId($postResult['writerId']);
        $books->setGenre($postResult['genre']);
        $books->setOtherGenre($postResult['otherGenre']);
        $books->setSinopse($postResult['sinopse']);

        $books->setBookCover($img['image']['name']);
        $books->create($books);
        $_SESSION['msg'] = "<p id='book_success' class='container'>Livro cadastrado com sucesso</p>";
        header("Location: ../../frontend/page/cadastros?page=1");
        die();
        
    }
    public function edit(){
        //getting the uploaded FILE post
        $img = $this->getImg();
    
        if (isset($img['image']) && !empty($img['image'])) {
            $target = $_SERVER['DOCUMENT_ROOT']."/assets/imgs/BookCover/".basename($img['image']['name']);
            move_uploaded_file($img['image']['tmp_name'], $target);
        }
        //setting
        $books = new Books;
        $postResult = $this->getPost();

        $books->setId($postResult['bookEditId']);
        $books->setBookName($postResult['bookName']);
        $books->setWriterId($postResult['writerId']);
        $books->setGenre($postResult['genre']);
        $books->setOtherGenre($postResult['otherGenre']);
        $books->setSinopse($postResult['sinopse']);
        $books->setBookCover($img['image']['name']);
        $books->update($books);
    
        $_SESSION['msg'] = "<p id='book_success' class='container'>Livro editado com sucesso</p>";
        header("Location: ../../frontend/page/cadastros?page=1");
        die();
    }
    public function delete(){
        $books = new Books;
        $postResult = $this->getPost();

        $books->setId($postResult['writerId']);
        $books->delete($books);
    
        $_SESSION['msg'] = "<p id='book_success' class='container'>Livro deletado com sucesso</p>";
        header("Location: ../../frontend/page/cadastros?page=1");
        die();

    }
    public function searchBook($resultSearch){
        $books = new Books;
        return $books->selectLike($resultSearch);

    }

}