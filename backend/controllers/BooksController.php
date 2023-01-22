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
        $cover = "sfoto.jpg";

        //getting the uploaded FILE post
        $img = $this->getImg(); 
        if (isset($img['image']['name']) && !empty($img['image']['name'])) {
            $target = $_SERVER['DOCUMENT_ROOT']."/assets/imgs/BookCover/".basename($img['image']['name']);
            move_uploaded_file($img['image']['tmp_name'], $target);
            $cover = $img['image']['name'];
        }
        //setting
        $books = new Books;
        $postResult = $this->getPost();

        $books->setBookName($postResult['bookName']);
        $books->setWriterId($postResult['writerId']);
        $books->setGenre($postResult['genre']);
        $books->setOtherGenre($postResult['otherGenre']);
        $books->setSinopse($postResult['sinopse']);

        $books->setBookCover($cover);
        // $books->setBookCover($img['image']['name']);
        $books->create($books);
        $_SESSION['msg'] = "<p id='book_success' class='container'>Livro cadastrado com sucesso</p>";
        header("Location: ../../frontend/page/cadastros?page=1");
        die();
        
    }
    public function edit(){
        $books = new Books;
        $postResult = $this->getPost();

        $books->setId($postResult['bookEditId']);
        $books->setBookName($postResult['bookName']);
        $books->setWriterId($postResult['writerId']);
        $books->setGenre($postResult['genre']);
        $books->setOtherGenre($postResult['otherGenre']);
        $books->setSinopse($postResult['sinopse']);
        $books->update($books);
    
        $_SESSION['msg'] = "<p id='book_success' class='container'>Livro editado com sucesso</p>";
        header("Location: ../../frontend/page/cadastros?page=1");
        die();
    }
    public function editBookCover(){
        //getting the uploaded FILE post
        $img = $this->getImg();
    
        if (isset($img['image']['name']) && !empty($img['image']['name'])) {
            $target = $_SERVER['DOCUMENT_ROOT']."/assets/imgs/BookCover/".basename($img['image']['name']);
            move_uploaded_file($img['image']['tmp_name'], $target);
        }
        $books = new Books;
        $postResult = $this->getPost();
        $books->setId($postResult['bookEditId']);
        $books->setBookCover($img['image']['name']);
        
        $books->updateCover($books);
    
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