<?php 
//editing books from the books table
session_start();
include('../database/connection.php');

$id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
$bookName = filter_input(INPUT_POST, 'bookName', FILTER_SANITIZE_STRING);
$writerId = filter_input(INPUT_POST, 'writer-name', FILTER_SANITIZE_NUMBER_INT);
$genre = $_POST['genre'];
$otherGenre = filter_input(INPUT_POST, 'otherGenre', FILTER_SANITIZE_STRING);
$sinopse = $_POST['sinopse'];

$sql = new Connect();
$sql->execute("UPDATE books SET book_name='$bookName', genre='$genre', other_genre='$otherGenre',
sinopse='$sinopse', writer_id='$writerId' WHERE id='$id'");

if($sql){
    $_SESSION['msg'] = "<p class='container' id='book_success'>Livro editado com sucesso</p>";
    header("Location: ../frontend/page/cadastros?page=1");
 }else{
    $_SESSION['msg'] = "<p>Erro!! livro não foi cadastrado</p>";
    header("Location: ../frontend/page/cadastros?page=1");
 }
?>