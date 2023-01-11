<?php
require_once("../../database/UserConnect.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="/assets/app.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="shortcut icon" href="/assets/imgs/library.png" type="image/x-icon">
</head>

<body>
    <?php include_once "../components/header.php"; ?>

    <div class="container" id="orange-text" style="margin-top: 8em;">
        <form class="form-signin" action="/backend/controllers/UserController.php" method="post" id="loginForm">
            <!-- <h1 class="h3 mb-3 font-weight-normal text-center" style="margin-top:2.5em;">Login</h1> -->
            <div class="row" id="login">
                <div class="col-sm-12 col-md-11 col-lg-6">
                    <h1 class="text-center">Login</h1>

                    <label for="inputEmail" class="sr-only" style="margin-top:2em;">Email address</label>
                    <input type="email" id="inputEmail" class="form-control" placeholder="Email address" required
                        autofocus>

                    <label for="inputPassword" class="sr-only" style="margin-top:2em;">Password</label>
                    <input type="password" id="inputPassword" class="form-control" placeholder="Password" minlength="6"
                        maxlength="16" required>
                    
                    <p style="margin-top:1.4em; font-size:.9em;"><a href="/frontend/page/register">Não é membro? se registre agora!</a></p>

                    <button class="btn btn-lg btn-outline-warning btn-block" style="margin-top: 1em;" 
                    name="login" id="writerButton" type="submit">Sign in</button>
                
                </div>
                <div class="col-sm-0 col-lg-1 col-md-1"></div>
                <div class="col-sm-0  col-lg-5 d-none d-lg-block">
                    <img src="/assets/imgs/book.png" alt="">
                </div>
                <div>
        </form>
        <p class="text-muted text-center" style="margin-top: 3.5em;">&copy; Copyright 2023 | VirtualLibrary</p>
        <!-- <p class="mt-5 mb-3 text-muted text-center">&copy; Copyright 2023 | VirtualLibrary</p> -->

    </div>
    <style>
        /* #login {
            border: 3px solid orange;
            width: 70%;
            margin-left: 15%;
            margin-top: 1em;
            height: 40em;
            justify-content: center;

        }
        #loginForm {
            width: 30em !important;
            margin: auto;
            margin-left: 6%;
            justify-content: center;
            
        } */
    </style>


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"
        integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V"
        crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script type="text/javascript" src="/src/app.js"></script>
</body>

</html>