<?php
if ($_SESSION['logged'] || !$_SESSION['logged']) {
    header("Location: ../page/oops");
}
?>
<div class="row" id="error">
    <div class="col-12"></div>
    <style>
        #error {
            position: absolute;
            top: 80px;
            right: 0;
            left: 0;
            width: 100%;
            height: 36em;
            background-color: #141414;
            background-position: center;
            background-repeat: no-repeat;
            background-image: url(/assets/imgs/error.png);
        }
    </style>
</div>