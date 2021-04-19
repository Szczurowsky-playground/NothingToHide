<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '../views/template/default.php');
?>
<head>
    <title>NothingToHide Framework - Register</title>
    <link href="core/css/form.css" rel="stylesheet">
</head>
<div class="wrapper fadeInDown">
    <div id="formContent">
        <h2 class="inactive underlineHover"><a href="/login"> Sign In</a></h2>
        <h2 class="active ">Sign Up </h2>
        <p> <?php
            error_reporting(E_ERROR | E_PARSE);
            echo $_POST['regError'];
            ?></p>
        <div class="fadeIn first">
            <img src="core/img/Logo.png" id="icon" alt="User Icon" />
        </div>

        <form action="/register/validate" method="post" id="login">
            <label for="login"></label><input type="text" id="login" class="fadeIn second" name="login" placeholder="Login">
            <label for="password"></label><input type="password" id="password" class="fadeIn third" name="password" placeholder="Password">
            <input type="submit" class="fadeIn fourth" value="Register">
        </form>

        <div id="formFooter">
            <a class="underlineHover" href="/login">Already registered?</a>
        </div>
    </div>
</div>


<noscript>
    <meta http-equiv="refresh" content="0;url=nojs.html">
</noscript>