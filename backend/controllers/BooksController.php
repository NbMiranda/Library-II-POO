<?php
session_start();
require_once("../../database/Connect.php");
require_once("../models/Writers.php");
require_once("../WritersQuery.php");
require_once("../models/Books.php");

$books = new books();

$postResult = filter_input_array(INPUT_POST);

if(isset($_POST['register'])){

    $books->setBookName($postResult['bookName']);
    $books->setWriterId($postResult['writerId']);
    $books->setGenre($postResult['genre']);
    $books->setOtherGenre($postResult['otherGenre']);
    $books->setSinopse($postResult['sinopse']);
    $books->create($books);

    $_SESSION['msg'] = "<p id='book_success' class='container'>Livro cadastrado com sucesso</p>";
    header("Location: ../../frontend/page/cadastros?page=1");
    die();
} 
elseif (isset($_POST['edit'])) {
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
elseif (isset($_POST['delete'])) {
    $books->setId($postResult['writerId']);
    $books->delete($books);

    $_SESSION['msg'] = "<p id='book_success' class='container'>Livro deletado com sucesso</p>";
    header("Location: ../../frontend/page/cadastros?page=1");
    die();
}