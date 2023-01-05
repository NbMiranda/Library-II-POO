<?php
//deleting books from books table  
session_start();
include('../database/connection.php');

$id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
$sql = new Connect();
$sql->execute("DELETE FROM books WHERE id='$id'");

if($sql){
    $_SESSION['msg'] = "<p class='container' id='book_success'>Livro deletado com sucesso</p>";
    header("Location: ../frontend/page/cadastros?page=1");
 }else{
    $_SESSION['msg'] = "<p>Erro!! Livro não foi deletado</p>";
    header("Location: ../frontend/page/cadastros?page=1");
 }
?>