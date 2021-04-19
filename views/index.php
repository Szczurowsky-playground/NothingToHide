<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '../views/template/default.php');
?>
<head>
    <title>NothingToHide Framework - Login</title>
    <link href="core/css/form.css" rel="stylesheet">
</head>
<div class="wrapper fadeInDown">
    <div id="formContent">
        <?php if(!isset($_COOKIE['nth_val1'])){echo '<h2 class="inactive underlineHover"><a href="/login">Sign In </a></h2>';} ?>
        <?php if(!isset($_COOKIE['nth_val1'])){echo '<h2 class="inactive underlineHover"><a href="/register">Sign Up </a></h2>';} ?>
        <?php if(isset($_COOKIE['nth_val1'])){echo '<h2 class="inactive underlineHover"><a href="/logout">Logout </a></h2>';} ?>
        <?php if(isset($_COOKIE['nth_val1'])){echo '<h2 class="inactive underlineHover"><a href="/info">Info </a></h2>';} ?>
        <?php
        if(!isset($_SESSION)){
            session_start();
        }
        if(isset($_SESSION['username'])){
            echo '<p> Witaj ' . $_SESSION['username'] . '</p>';
        }
        ?>
        <div class="fadeIn first">
            <img src="core/img/Logo.png" id="icon" alt="User Icon" />
        </div>

        <h1>Nothing To Hide Framework</h1>
        <h3>About</h3>
        <p>Welcome dear user, NTH for this time does not support laravel, symfony etc. It's build on it's own basic framework. NTH have basic functionality like routing, login/register and logs all important data about login.</p>
        <h3>How do i use this?</h3>
        <p>Site have basic and responsive CSS design. All what u need to do is changing style of page. Code is really easy to understand and no one with basic knowledge of IT should know how to implement it.</p>
        <h4>I hope you gonna have nice usage from this - Szczurowsky</h4>

    </div>
</div>

<noscript>
    <meta http-equiv="refresh" content="0;url=nojs.html">
</noscript>