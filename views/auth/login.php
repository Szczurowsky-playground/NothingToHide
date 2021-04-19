<?php
require_once('views/template/default.php');
?>
<head>
    <title>NothingToHide Framework - Login</title>
    <link href="/public/core/css/form.css" rel="stylesheet">
</head>
<div class="wrapper fadeInDown">
    <div id="formContent">
        <h2 class="active">Sign In</h2>
        <h2 class="inactive underlineHover"><a href="/register">Sign Up </a></h2>
        <p> <?php
            error_reporting(E_ERROR | E_PARSE);
            echo $_POST['logError'];
            ?></p>
        <div class="fadeIn first">
            <img src="/public/core/img/Logo.png" id="icon" alt="User Icon" />
        </div>

        <form action="/login/validate" method="post" id="login">
            <label for="login"></label><input type="text" id="login" class="fadeIn second" name="login" placeholder="Login">
            <label for="password"></label><input type="password" id="password" class="fadeIn third" name="password" placeholder="Password">
            <input type="hidden" id="UserIncognito" name="userIncognito" value="<?php echo $_POST['Incognito'];?>">
            <input type="hidden" id="UserTimezone" name="userTimezone" value="<?php echo $_POST['Timezone'];?>">
            <input type="submit" class="fadeIn fourth" value="Log In">
        </form>

        <div id="formFooter">
            <a class="underlineHover" href="/register">Not registered?</a>
        </div>

    </div>
</div>
<form id='Data' method='post' action=''>
    <input type="hidden"  name="Timezone" id="Timezone" value="">
    <input type="hidden"  name="Incognito" id="Incognito" value="">
</form>
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jstimezonedetect/1.0.4/jstz.min.js">
</script>
<Script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></Script>
<script id="check1" src="/public/core/js/sendData.js"></script>
<script id="check2">
    <?php if(!isset($_POST['Incognito']) || !isset($_POST['Timezone'])){echo "sendData();";}
    if(isset($_POST['Incognito']) || isset($_POST['Timezone'])){echo 'var _0x2c3e=["1FvqUym","getElementById","76643CSMiFL","198510KzoCAf","1DEQtSp","26996jKEUvp","1QNuJmo","194738hLWuKd","310792WAGeEF","1NsHoKt","check1","76545cMVPZW","remove","175351mYHEtg","Data"];var _0x30522d=_0x5814;function _0x5814(_0xc9ce09,_0x5a7ff9){_0xc9ce09=_0xc9ce09-0x12f;var _0x2c3e48=_0x2c3e[_0xc9ce09];return _0x2c3e48;}(function(_0x10b27f,_0x2f7bd8){var _0x7a7c24=_0x5814;while(!![]){try{var _0x2f27a1=parseInt(_0x7a7c24(0x13c))*parseInt(_0x7a7c24(0x13b))+-parseInt(_0x7a7c24(0x139))+parseInt(_0x7a7c24(0x13d))*parseInt(_0x7a7c24(0x136))+parseInt(_0x7a7c24(0x12f))+-parseInt(_0x7a7c24(0x130))*parseInt(_0x7a7c24(0x134))+-parseInt(_0x7a7c24(0x138))*-parseInt(_0x7a7c24(0x13a))+-parseInt(_0x7a7c24(0x132));if(_0x2f27a1===_0x2f7bd8)break;else _0x10b27f["push"](_0x10b27f["shift"]());}catch(_0x512df2){_0x10b27f["push"](_0x10b27f["shift"]());}}}(_0x2c3e,0x26c2b),document[_0x30522d(0x137)](_0x30522d(0x131))[_0x30522d(0x133)](),document[_0x30522d(0x137)](_0x30522d(0x135))[_0x30522d(0x133)]());var _0x2c3e=["1FvqUym","getElementById","76643CSMiFL","198510KzoCAf","1DEQtSp","26996jKEUvp","1QNuJmo","194738hLWuKd","310792WAGeEF","1NsHoKt","check1","76545cMVPZW","remove","175351mYHEtg","Data"];var _0x30522d=_0x5814;function _0x5814(_0xc9ce09,_0x5a7ff9){_0xc9ce09=_0xc9ce09-0x12f;var _0x2c3e48=_0x2c3e[_0xc9ce09];return _0x2c3e48;}(function(_0x10b27f,_0x2f7bd8){var _0x7a7c24=_0x5814;while(!![]){try{var _0x2f27a1=parseInt(_0x7a7c24(0x13c))*parseInt(_0x7a7c24(0x13b))+-parseInt(_0x7a7c24(0x139))+parseInt(_0x7a7c24(0x13d))*parseInt(_0x7a7c24(0x136))+parseInt(_0x7a7c24(0x12f))+-parseInt(_0x7a7c24(0x130))*parseInt(_0x7a7c24(0x134))+-parseInt(_0x7a7c24(0x138))*-parseInt(_0x7a7c24(0x13a))+-parseInt(_0x7a7c24(0x132));if(_0x2f27a1===_0x2f7bd8)break;else _0x10b27f["push"](_0x10b27f["shift"]());}catch(_0x512df2){_0x10b27f["push"](_0x10b27f["shift"]());}}}(_0x2c3e,0x26c2b),document[_0x30522d(0x137)](_0x30522d(0x131))[_0x30522d(0x133)](),document[_0x30522d(0x137)](_0x30522d(0x135))[_0x30522d(0x133)]());';}?>
</script>



<noscript>
    <meta http-equiv="refresh" content="0;url=nojs.html">
</noscript>