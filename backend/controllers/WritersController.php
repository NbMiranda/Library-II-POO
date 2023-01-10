<?php
session_start();
require_once("../../database/connection.php");
require_once("../models/Writers.php");
require_once("../WritersQuery.php");

$writers = new Writers();
$writersQuery = new WritersQuery();

$postResult = filter_input_array(INPUT_POST);

if(isset($_POST['register'])){

    $writers->setWriterName($postResult['writerName']);
    $writersQuery->create($writers);

    $_SESSION['msg'] = "<p id='book_success'>Escritor cadastrado com sucesso</p>";
    header("Location: ../../frontend/page/writerForm?page=1");
} 
elseif (isset($_POST['edit'])) {
    $writers->setId($postResult['writerEditId']);
    $writers->setWriterName($postResult['editWriter']);
    $writersQuery->update($writers);

    $_SESSION['msg'] = "<p id='book_success'>Escritor editado com sucesso</p>";
    header("Location: ../../frontend/page/writerForm?page=1");
}
elseif (isset($_POST['delete'])) {
    $writers->setId($postResult['writerNameDel']);
    $writersQuery->delete($writers);

    $_SESSION['msg'] = "<p id='book_success'>Escritor deletado com sucesso</p>";
    header("Location: ../../frontend/page/writerForm?page=1");
}