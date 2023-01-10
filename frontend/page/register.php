<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="/assets/app.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body>
    <?php include_once "../components/header.php"; ?>
    <div class="container">
        <div class="row" id="register">
            <div class="col-12 text-center" style="height: 0px; margin-top:1em;"><img class="mb-4" src="/assets/imgs/library.png" alt="" width="83" height="79"></div>
            <div class="col-12">
                <form class="form-signin" id="registerForm">
                    <h1 class="h3 mb-3 font-weight-normal text-center" style="margin-top:2.5em;">Register</h1>
                    <label for="inputEmail" class="sr-only" style="margin-top:2em;">Email address</label>
                    <input type="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
                    <label for="inputPassword" class="sr-only" style="margin-top:1.3em;">Password</label>
                    <input type="password" id="inputPassword" class="form-control" placeholder="Password" required>
                    <button class="btn btn-lg btn-primary btn-block" style="margin-top: 1em;" type="submit">Sign in</button>
                    <p class="mt-5 mb-3 text-muted text-center">&copy; Copyright 2023 | VirtualLibrary</p>
                </form>
            </div>
        </div>

    </div>
    <style>
        #register {
            border: 3px solid orange;
            width: 70%;
            margin-left: 15%;
            margin-top: 1em;
            height: 40em;
            justify-content: center;

        }
        #registerForm {
            width: 30em !important;
            margin: auto;
            /* margin-left: 6%; */
            justify-content: center;
            
        }
     
    </style>


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script type="text/javascript" src="/src/app.js"></script>
</body>

</html>