<?php
//deleting writers from writer table 
session_start();
include('../database/connection.php');
// $conn =connect();

$writerNameDel = filter_input(INPUT_POST, 'writerNameDel', FILTER_SANITIZE_NUMBER_INT);

// $sqlCheck = $conn->prepare("SELECT * FROM books WHERE writer_id = $writerNameDel");
// $sqlCheck->execute(array());
// $resultCheck = $sqlCheck->fetchAll();

$sqlCheck = new Connect();
$sqlCheck->setQuery("SELECT * FROM books WHERE writer_id = $writerNameDel");
$resultCheck = $sqlCheck->getQuery();

$livro = $resultCheck[0]['book_name'];
$id = $resultCheck[0]['id'];

if ($resultCheck[0]['writer_id'] == $writerNameDel ) {
   $_SESSION['msg'] = "<p class='container' style='color:red;'>Não foi possivel deletar <br> escritor associado ao livro <br>
     <i><b><a href='/frontend/page/editForm?id=$id' style='text-decoration: underline !important;'>$livro</a></b></i></p>";
   header("Location: ../frontend/page/cadastros?page=1");
}else {
   // $sql = $conn->prepare("DELETE FROM writers WHERE id='$writerNameDel'");
   // $sql = new Connect();
   $sqlCheck->execute("DELETE FROM writers WHERE id='$writerNameDel'");

   if($sqlCheck){
      $_SESSION['msg'] = "<p id='book_success'>Escritor deletado com sucesso</p>";
      header("Location: ../frontend/page/writerForm?page=1");
   }else{
      $_SESSION['msg'] = "<p>Erro!! escritor não foi deletado</p>";
      header("Location: ../frontend/page/writerForm?page=1");
   }
}
?>