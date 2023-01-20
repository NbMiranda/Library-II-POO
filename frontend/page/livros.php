<?php
session_start();

if (!$_SESSION['logged']) {
    header("Location: oops");
    die();
}
include_once "../../backend/models/Books.php";
include_once "../../backend/models/Writers.php";

$books = new Books();
$writers = new Writers();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastros</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="/assets/style.css">
    <link rel="shortcut icon" href="/assets/imgs/library.png" type="image/x-icon">
</head>

<body>
    <?php
    include_once("../components/header.php");
    ?>
    <div class="container book_background">
        <h1 class="text-center" id="orange-text">Livros</h1>
    </div>
    <style>
        .book_background{
            background-color: #8F8F8F;
            width: auto;
            height: 10em;
            background-image: url(/assets/imgs/booksBackground.png);
            background-position: center;
            display: flex;
            justify-content: center;
            align-items: center;
            margin-bottom: 2em;
        }
        .book_background h1{
            font-weight: 800;
        }
        #book_cover{
            /* border: 1px solid red;  */
            height: 20em;
            width: auto;
            /* background-image: url(/assets/imgs/pj22.jpg); */
            background-position: center;
            background-size: contain;
            background-repeat: no-repeat;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        #book-content{
            /* border: 1px solid red;  */
            height: 30em;
            margin-bottom: 2em;
        }
        #book_title{
            display: flex;
            justify-content: center;
            align-items: center;
        }
        #book-content p {
            margin-bottom: .8em;
        }
    </style>
    <section class="container">
        <div class='row'>
            <?php
            foreach ($books->read() as $key) {
                $book_name = $key->getBookName();
                $writer_name = $key->getWriterName();
                $genre = $key->getGenre();
                $other_genre = $key->getOtherGenre();
                $bookCover = $key->getBookCover();

                echo "

                    <div class='col-lg-3 col-md-6 col-sm-12' id='book-content'>
                        <h4 class='text-center' style='height:2.3em; color:orange;'id='book_title'>$book_name</h4>
                        <div id='book_cover' 
                        style='background-image: url(/assets/imgs/BookCover/$bookCover);'>
                            
                        </div>
                        <div>
                            <p class='text-center'><b>Escritor: <span style='color:orange;'>
                            $writer_name</span></b>
                            </p>
                            <p class='container text-center'><b>Generos:</b> $genre,  $other_genre</p>
                        </div>
                    </div>


                ";
            }
            ?>
        </div>
    </section>


    <?php
    include '../components/footer.php';
    ?>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"
        integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V"
        crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script type="text/javascript" src="/src/app.js"></script>
</body>