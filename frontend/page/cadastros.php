<?php
session_start();
include_once '../../database/connection.php';
$conn = connect();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastros</title>
    <link rel="stylesheet" href="/assets/app.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body>
    <?php
    include '../components/header.php';
    ?>
    <div class="text-center" id='orange-text'>
        <h1 style="margin-top: 2em;">Cadastre seu Livro</h1>
    </div>
    <?php
    if (isset($_SESSION['msg'])) {
        echo $_SESSION['msg'];
        unset($_SESSION['msg']);
    }
    //sql writers
    $stmt = $conn->prepare("SELECT * FROM writers");
    $stmt->execute(array());
    $writersResult = $stmt->fetchAll();
    //sql books
    $sql = $conn->prepare("SELECT * FROM books");
    $sql->execute(array());
    $result = $sql->fetchAll();
    
    ?>

    <!-- register form -->
    <div class="container">
        <form action="../../backend/register.php" method="post">
            <div class="row" id="orange-text">
                <div class="col-6" id="forms">
                    <div class="form-group">
                        <label for="book-name">Nome do Livro</label>
                        <input type="text" class="form-control" name="book-name" id="book-name" required>
                    </div>
                </div>

                <div class="col-4" id="forms">
                    <div class="form-group">
                        <label for="writer-name">Nome do escritor</label>
                        <select class="form-select" aria-label="Default select example" name="writer-name" required
                            id="writer-name">
                            <option value="">-- Escolha o escritor --</option>
                            <?php
                            foreach ($writersResult as $row) {
                                $writerName = $row['writer_name'];
                                $writer_id = $row['id'];
                                echo "<option value='$writer_id'>$writerName</option>";
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="col-2" >
                    <a href="writerForm?page=1" class="btn btn-outline-warning"
                     id="writerButton" style="margin-top:3.1em;">Novo escritor</a>
                    
                </div>

            </div>
            <div class="row" id="orange-text">

                <div class="col-6" id="forms">
                    <div class="form-group">
                        <label for="genre">Genero</label>
                        <select class="form-select " aria-label="Default select example" name="genre" id="genre" required>
                            <option value="">-- Escolha o Gênero --</option>
                            <?php
                            $array = array('Acao e aventura', 'Biografia', 'Drama', 'Ficcao', 'Terror', 'Humor', 'Infantil', 'Romance',);
                            $i = 0;
                        
                            foreach ($array as $rows) {
                                $genre = $array[$i];
                                echo "<option value='$genre'>$genre</option>";
                                $i++;
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="col-6" id="forms">
                    <div class="form-group">
                        <label for="other-genres">Gêneros secundarios</label>
                        <input type="text" minlength="2" maxlength="50" class="form-control" 
                            name="other-genres" id="other-genres">
                    </div>
                </div>
            </div>
            <div class="row" id="orange-text">
                <div class="form-group col-12" id="forms">
                    <label for="textarea" id="orange-text">Sinopse</label>
                    <textarea class="form-control" name="sinopse" id="textarea" cols="20"
                     rows="6"></textarea>
                </div>
            </div>
            <button type="submit" class="btn btn-light" id="forms">Cadastrar</button>
        </form>
    </div>
    <!-- end register form -->
    <style>
        h2{
            align-items: center;
        }
    </style>
    <!-- Collapse Search DB -->
    <div class="container ">
        <h2 id='orange-text' class="text-center" style='margin-top: 2em;'>Livros Cadastrados
        <button class="btn btn-outline-warning" id="arrowBtn" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
            <!-- ↴ --> <i class="bi bi-caret-down-fill"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-down-fill" viewBox="0 0 16 16">
            <path d="M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z"/>
            </svg></i>

            <style>
                #arrowBtn:hover{
                    color: #b77905;
                    border-color: #b77905;
                    background-color: #ffffff00;
                    transition: .6s;
                }
                #arrowBtn{
                    color: orange;
                    
                }
            </style>

        </button>
        </h2>
        <div class="row ">
            <div class="col-4"></div>
            <div class="col-4" style="padding: 0;">
                <div class="collapse" id="collapseExample">
                    <div class="card card-body" style="background-color:#141414; font-size: 1.2em; border: none; padding:0;">
                        <div class="form-group">
                            <form action="" method="post">
                                <label for="search" style="font-size: .8em !important;">Pesquise um Livro</label>
                                <input type="text" class="form-control" name="search" id="search" placeholder="Nome do Livro" style="margin-bottom: 1em;">
                            </form>
                            <ul class="resultado" style="padding:0;"></ul>
                            
                        </div> 
                    </div>
                </div>
            </div>
            <div class="col-4"></div>
        </div>
    </div>
    <?php
    ?>
    
    <?php
    // page limitation
    $page_current = filter_input(INPUT_GET, 'page', FILTER_SANITIZE_NUMBER_INT);
    $page = (!empty($page_current)) ? $page_current : 1;
    $pg_qty = 10;
    $start = ($pg_qty * $page) - $pg_qty;
    //sql query and print result 
    $sqlPage = $conn->prepare("SELECT b.id, b.book_name, b.genre, b.other_genre, b.sinopse, w.writer_name FROM books as b, writers as w WHERE w.id = b.writer_id ORDER BY book_name LIMIT $start, $pg_qty");

    $sqlPage->execute(array());
    $resultJoin = $sqlPage->fetchAll();
    echo "<div class='container text-center'>
            
            <div class='row' style='margin-top:2em;'>
                
                <div class='col-3'> <h3>Livro</h3></div>
                <div class='col-3'> <h3>Autor</h3></div>
                <div class='col-3'> <h3>Gênero</h3></div>
                <div class='col-3'> <h3></h3></div>
            </div>
    
    
        </div>";
    
    
    foreach ($resultJoin as $key ) {
        $book_name = $key['book_name'];
        $writer_name = $key['writer_name'];
        $genre = $key['genre'];
        $other_genre = $key['other_genre'];
        $sinopse = $key['sinopse'];
        $id = $key['id'];

        echo "<div class='container text-center'>
            <div class='row'>
                
                <div class='sqlResult col-3'> <p>$book_name</p></div>
                <div class='sqlResult col-3'> <p>$writer_name</p></div>
                
                <div class='sqlResult col-3'><p>$genre $other_genre</p></div>
                <div class='sqlResult col-3 text-center'> 
                <a href='editForm?id=$id' class='btn' role='button'>
                <i class='bi bi-pencil-square'><svg xmlns='http://www.w3.org/2000/svg' width='23' height='23' fill='currentColor' class='bi bi-pencil-square' viewBox='0 0 16 16'>
                <path d='M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z'/>
                <path fill-rule='evenodd' d='M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z'/>
              </svg></i></a>        
                </div>
            </div>   
        </div>";
        
    }
    //pagination
    ?>
    <div class="container text-center" style="font-size: 1.4em;">
        <?php
        $count = $conn->query("SELECT count(*) FROM books")->fetchColumn();
        $i = 1;
        while ($count > 0) {
            if ($page_current == $i) {
                echo "<span id='page-nav'><a href='cadastros?page=$i'>$i</a></span> ";        
            } else {
                echo "<a href='cadastros?page=$i'>$i</a> ";    
            }
            $count = $count - 10;
            $i++;
        }
        if ($page_current >= $i) {
            include_once '../components/error.php';
        }
        ?>
    </div>

    <?php
    include '../components/footer.php';
    ?>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script type="text/javascript" src="/src/app.js"></script>
</body>