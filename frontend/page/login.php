<?php
session_start();
require_once("../../database/UserConnect.php");
if ($_SESSION['logged']) {
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
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="/assets/style.css">
    <link rel="shortcut icon" href="/assets/imgs/library.png" type="image/x-icon">
</head>

<body>
    <?php include_once "../components/header.php"; ?>

    <div class="container" id="orange-text" style="margin-top: 20vh;">
        <form class="form-signin" action="/backend/controllers/UserController.php" method="post" id="loginForm">
            <div class="row" id="login">
                <div class="col-sm-12 col-md-11 col-lg-6">                 
                    <h1 class="text-center">Login</h1>
                    <!-- Input email -->
                    <label for="inputEmail" class="sr-only" style="margin-top:2em;">Email</label>
                    <input type="email" id="inputEmail" class="form-control" name="email" 
                    placeholder="Digite seu Email" required autofocus>
                    <!-- Input password -->
                    <label for="inputPassword" class="sr-only" style="margin-top:2em;">Senha</label>
                    <input type="password" id="inputPassword" class="form-control" name="password"
                    placeholder="Digite sua senha" maxlength="16" required>
                    <!-- user not found message -->
                    <?php
                        if (isset($_SESSION['message'])) {
                            echo $_SESSION['message'];
                            unset($_SESSION['message']);
                        }
                    ?>
                    <!-- Register link -->
                    <p style="margin-top:1.4em; font-size:.9em;"><a href="/frontend/page/register">Não é membro? se registre agora!</a></p>
                    <!-- Submit button -->
                    <button class="btn btn-lg btn-outline-warning btn-block" style="margin-top: 1em;" 
                    name="login" id="writerButton" type="submit">Sign in</button>
                </div>
                <div class="col-sm-0 col-lg-1 col-md-1"></div>
                <div class="col-sm-0  col-lg-5 d-none d-lg-block">
                    <img src="/assets/imgs/astrology.png" alt="">
                </div>
                <div>
        </form>
        <!-- <p class="text-muted text-center" style="margin-top: 3.5em;">&copy; Copyright 2023 | VirtualLibrary</p> -->
        <!-- <p class="-mt5 mb-3 text-muted text-center">&copy; Copyright 2023 | VirtualLibrary</p> -->
    </div>

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