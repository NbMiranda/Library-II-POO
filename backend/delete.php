<?php
//deleting books from books table  
session_start();
include('../database/connection.php');
$conn =connect();

$id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
$sql = $conn->prepare("DELETE FROM books WHERE id='$id'");
$sql->execute();

if($sql){
    $_SESSION['msg'] = "<p class='container' id='book_success'>Livro deletado com sucesso</p>";
    header("Location: ../frontend/page/cadastros?page=1");
 }else{
    $_SESSION['msg'] = "<p>Erro!! Livro não foi deletado</p>";
    header("Location: ../frontend/page/cadastros?page=1");
 }
?>