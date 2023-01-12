<?php
session_start();
if ($_SESSION['logged']) {
    header("Location: oops");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="/assets/style.css">
    <link rel="shortcut icon" href="/assets/imgs/library.png" type="image/x-icon">
</head>

<body>
    <?php include_once "../components/header.php"; ?>

    <div class="container" id="orange-text" style="margin-top: 8em;">
        <form class="form-signin" action="/backend/controllers/UserController.php" method="post">
            <div class="row">
                <div class="col-sm-0  col-lg-5 d-none d-lg-block">
                    <img src="/assets/imgs/study.png" alt="">
                </div>

                <div class="col-sm-0 col-lg-1 col-md-1"></div>

                <div class="col-sm-12 col-md-12 col-lg-6">
                    <h1 class="text-center">Cadastre-se</h1>
                    <!-- Input Nome Completo -->
                    <label for="userName" class="sr-only" style="margin-top:1em;">Nome Completo</label>
                    <input type="text" id="userName" class="form-control" name="userName"
                    placeholder="Digite seu nome completo" required>
                    <!-- Input Email -->
                    <label for="inputEmail" class="sr-only" style="margin-top:1em;">Email</label>
                    <input type="email" id="inputEmail" class="form-control" name="email"
                    placeholder="Digite o endereço de email" required autofocus>
                    <!-- Input Password -->
                    <label for="inputPassword" class="sr-only" style="margin-top:1em;">Senha</label>
                    <input type="password" id="inputPassword" class="form-control" name="password"
                    placeholder="Digite uma senha" minlength="6" maxlength="16" required>
                    <!-- Input Celular -->
                    <label for="phoneNumber" class="sr-only" style="margin-top:1em;">Celular (opcional)</label>
                    <input type="text" id="phoneNumber" class="form-control" name="phoneNumber" 
                    placeholder="(xx) xxxxx-xxxx">
                    <!-- Submit button -->
                    <button class="btn btn-lg btn-outline-warning btn-block" style="margin-top: 2em;" 
                    name="register" id="writerButton" type="submit">Sign in</button>
                </div>
            </div>
        </form>
        <!-- <p class="text-muted text-center" style="margin-top: 1.3em; font-size: 1.4em;">&copy; Copyright 2023 | VirtualLibrary</p> -->
        <!-- <p class="mt-5 mb-3 text-muted text-center">&copy; Copyright 2023 | VirtualLibrary</p> -->
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