<?php 
//registering books from books table
session_start();
include('../database/connection.php');
$conn =connect();

$bookName = filter_input(INPUT_POST, 'book-name', FILTER_SANITIZE_STRING);
$writerName = filter_input(INPUT_POST, 'writer-name', FILTER_SANITIZE_NUMBER_INT);
$genre = $_POST['genre'];
$otherGenre = filter_input(INPUT_POST, 'other-genres', FILTER_SANITIZE_STRING);
$sinopse = $_POST['sinopse'];

$sql = $conn->prepare("INSERT INTO books (book_name, genre, other_genre, sinopse, writer_id)
VALUES('$bookName', '$genre', '$otherGenre', '$sinopse', '$writerName')");

$sql->execute();

if($sql){
    $_SESSION['msg'] = "<p class='container' id='book_success'>Livro cadastrado com sucesso</p>";
    header("Location: ../frontend/page/cadastros?page=1");
 }else{
    $_SESSION['msg'] = "<p>Erro!! Livro não foi cadastrado</p>";
    header("Location: ../frontend/page/cadastros?page=1");
 }
?>