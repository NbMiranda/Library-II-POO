<?php
require_once("../../backend/models/Books.php");

$books = new Books;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carousel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="/assets/style.css">
    <link rel="shortcut icon" href="/assets/imgs/library.png" type="image/x-icon">
</head>

<body>
<?php

echo($result[0]->getBookName());


?>
    <!-- Teste -->
<section class="container">
    <h2 class="text-center" id="orange-text" style="margin:2em 0 2em 0;">Alguns dos Livros já Cadastrados</h2>
    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <div class="cards-wrapper">
                    <div class="card">
                        <div class="image-wrapper">
                            <img src="/assets/imgs/model.png"
                                alt="...">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title"><?php echo "$result[0]->getBookName()" ?></h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk
                                of the card's
                                content.</p>
                            <a href="#" class="btn btn-primary">Go somewhere</a>
                        </div>
                    </div>
                    <div class="card">
                        <div class="image-wrapper">
                        <img src="/assets/imgs/model.png"
                                alt="...">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk
                                of the card's
                                content.</p>
                            <a href="#" class="btn btn-primary">Go somewhere</a>
                        </div>
                    </div>
                    <div class="card">
                        <div class="image-wrapper">
                        <img src="/assets/imgs/model.png"
                                alt="...">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk
                                of the card's
                                content.</p>
                            <a href="#" class="btn btn-primary">Go somewhere</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <div class="cards-wrapper">
                    <div class="card">
                        <div class="image-wrapper">
                        <img src="/assets/imgs/model.png"
                                alt="...">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk
                                of the card's
                                content.</p>
                            <a href="#" class="btn btn-primary">Go somewhere</a>
                        </div>
                    </div>
                    <div class="card">
                        <div class="image-wrapper">
                        <img src="/assets/imgs/model.png"
                                alt="...">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk
                                of the card's
                                content.</p>
                            <a href="#" class="btn btn-primary">Go somewhere</a>
                        </div>
                    </div>
                    <div class="card">
                        <div class="image-wrapper">
                        <img src="/assets/imgs/model.png"
                                alt="...">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk
                                of the card's
                                content.</p>
                            <a href="#" class="btn btn-primary">Go somewhere</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <div class="cards-wrapper">
                    <div class="card">
                        <div class="image-wrapper">
                        <img src="/assets/imgs/model.png"
                                alt="...">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk
                                of the card's
                                content.</p>
                            <a href="#" class="btn btn-primary">Go somewhere</a>
                        </div>
                    </div>
                    <div class="card">
                        <div class="image-wrapper">
                        <img src="/assets/imgs/model.png"
                                alt="...">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk
                                of the card's
                                content.</p>
                            <a href="#" class="btn btn-primary">Go somewhere</a>
                        </div>
                    </div>
                    <div class="card">
                        <div class="image-wrapper">
                        <img src="/assets/imgs/model.png"
                                alt="...">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk
                                of the card's
                                content.</p>
                            <a href="#" class="btn btn-primary">Go somewhere</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <p class="mt-5 text-center">Get a step-by-step written explanation here: <a
            href="https://codingyaar.com/bootstrap-4-carousel-multiple-items-responsive/" target="_blank">Bootstrap
            Carousel Card Slider
        </a> </p>

    <p class="mt-3 text-center">Get a step-by-step video explanation here: <a href="https://youtu.be/kHPm_AlxP7U"
            target="_blank">Bootstrap Carousel Card Slider
        </a> </p>

</section>

<style>
    .card {
            border: none;
            border-radius: 0;
            box-shadow: 2px 6px 8px 0 rgba(22, 22, 26, 0.18);
            background-color: #141414;
        }
        .carousel-inner {
        /* padding: 1em; */
        }
            /* .carousel-control-prev,
            .carousel-control-next {
            background-color: black;
            width: 6vh;
            height: 6vh;
            border-radius: 50%;
            top: 50%;
            transform: translateY(-50%); */
        }
        .carousel-control-prev span,
        .carousel-control-next span {
            /* width: 1.5rem;
            height: 1.5rem; */
        }
        @media screen and (min-width: 577px) {
        .cards-wrapper {
            display: flex;
            background-color: #141414;
        }
        .card {
            margin: 0 0.5em;
            width: calc(100% / 2);
        }
        .image-wrapper {
            height: 30vw;
            margin: 0 auto;
        }
        }
        @media screen and (max-width: 576px) {
        .card:not(:first-child) {
            display: none;
        }
        }

        .image-wrapper img {
            max-width: 100%;
            max-height: 100%;
        }
        .card-body{
            color: white;
            background-color: #141414;
        }
</style>
<!-- Fim Teste -->





    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"
        integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V"
        crossorigin="anonymous"></script>

</body>

</html>