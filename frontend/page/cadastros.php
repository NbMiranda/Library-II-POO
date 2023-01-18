<?php
session_start();
include_once "../../backend/models/Books.php";
include_once "../../backend/models/Writers.php";

$books = new Books();
$writers = new Writers();
$books->setPage(filter_input(INPUT_GET, 'page', FILTER_SANITIZE_NUMBER_INT));

if (!$_SESSION['logged']) {
    header("Location: oops");
    die();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastros</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="/assets/style.css">
    <link rel="shortcut icon" href="/assets/imgs/library.png" type="image/x-icon">
</head>

<body>
    <?php include '../components/header.php';?>
    <div class="text-center" id='orange-text'>
        <h1 style="margin-top: 2em;">Cadastre seu Livro</h1>
    </div>
    <?php
    if (isset($_SESSION['msg'])) {
        echo $_SESSION['msg'];
        unset($_SESSION['msg']);
    }   
    ?>

    <!-- register form -->
    <div class="container">
        <form action="../../backend/operations/booksOperation.php" method="post">
            <div class="row" id="orange-text">
                <div class="col-6" id="forms">
                    <div class="form-group">
                        <label for="book-name">Nome do Livro</label>
                        <input type="text" class="form-control" name="bookName" id="book-name" required>
                    </div>
                </div>
                <div class="col-4" id="forms">
                    <div class="form-group">
                        <label for="writer-name">Nome do escritor</label>
                        <select class="form-select" aria-label="Default select example" name="writerId" required
                            id="writerId">
                            <option value="">-- Escolha o escritor --</option>
                            <?php
                            foreach ($writers->read() as $row) {
                                $writerName = $row->getWriterName();
                                $writer_id = $row->getId();
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
                            foreach (Books::genres() as $row) {
                                echo "<option value='$row'>$row</option>";
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="col-6" id="forms">
                    <div class="form-group">
                        <label for="otherGenre">Gêneros secundarios</label>
                        <input type="text" minlength="2" maxlength="50" class="form-control" 
                            name="otherGenre" id="other-genres">
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
            <button type="submit" name="register" class="btn btn-light" id="forms">Cadastrar</button>
        </form>
    </div>
    <!-- end register form -->

    <!-- Collapse Search DB -->
    <div class="container ">
        <h2 id='orange-text' class="text-center" style='margin-top: 2em;'>Livros Cadastrados
        <button class="btn btn-outline-warning" id="arrowBtn" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
            <i class="bi bi-caret-down-fill"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-down-fill" viewBox="0 0 16 16">
            <path d="M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z"/>
            </svg></i>
        </button>
        </h2>
        <!-- Collapse search book -->
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
        <!-- select books output -->
    </div>   
    <?php
    echo "<div class='container text-center'>
            <div class='row' style='margin-top:2em;'>
                <div class='col-3'> <h3>Livro</h3></div>
                <div class='col-3'> <h3>Autor</h3></div>
                <div class='col-3'> <h3>Gênero</h3></div>
                <div class='col-3'> <h3></h3></div>
            </div>    
        </div>";   
    
    foreach ($books->readLimit() as $key ) {
        $book_name = $key->getBookName();
        $writer_name = $key->getWriterName();
        $genre = $key->getGenre();
        $other_genre = $key->getOtherGenre();
        $id = $key->getId();

        echo "
        <div class='container text-center'>
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
    ?>
    <div class="container text-center" style="font-size: 1.4em;">
        <?php
        $books->pageNav();
        ?>
    </div>
    <?php
    include '../components/footer.php';
    ?>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script type="text/javascript" src="/src/script.js"></script>
</body>