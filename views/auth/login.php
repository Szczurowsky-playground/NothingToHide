<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '../views/template/default.php');
?>
<head>
    <title>NothingToHide Framework - Login</title>
    <link href="core/css/form.css" rel="stylesheet">
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
            <img src="core/img/Logo.png" id="icon" alt="User Icon" />
        </div>

        <form action="/login/validate" method="post" id="login">
            <label for="login"></label><input type="text" id="login" class="fadeIn second" name="login" placeholder="Login">
            <label for="password"></label><input type="password" id="password" class="fadeIn third" name="password" placeholder="Password">
            <input type="hidden" id="Incognito" name="Incognito" value="<?php echo $_POST['Incognito'];?>">
            <input type="submit" class="fadeIn fourth" value="Log In">
        </form>

        <div id="formFooter">
            <a class="underlineHover" href="#">Forgot Password?</a>
        </div>

    </div>
</div>
<form id='NotIncognito1' method='post' action=''>

    <input type="hidden"  name="Incognito" id="Incognito" value="0">
</form>

<form id='Incognito1' method='post' action=''>
    <input type="hidden"  name="Incognito" id="Incognito" value="1">
</form>
<Script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></Script>
<script id="check">
    var _0x1963=['estimate','log','129395huEDul','12588feQFBH','Not\x20Incognito','submit','val','Incognito1','Incognito','ajax','19QyhKug','472795tUrXHe','67qFNJuv','8571rKdVKr','post','23LbUOqo','#Incognito1','459033dgDmru','Error','47OinYWV','1465428UmPHaC','storage'];(function(_0x246e6e,_0x250497){var _0x5901ba=_0x118c;while(!![]){try{var _0x5186f6=parseInt(_0x5901ba(0x10f))*-parseInt(_0x5901ba(0x111))+-parseInt(_0x5901ba(0x114))*-parseInt(_0x5901ba(0x108))+-parseInt(_0x5901ba(0x107))+-parseInt(_0x5901ba(0x110))+-parseInt(_0x5901ba(0x116))+parseInt(_0x5901ba(0x102))*-parseInt(_0x5901ba(0x112))+parseInt(_0x5901ba(0x103));if(_0x5186f6===_0x250497)break;else _0x246e6e['push'](_0x246e6e['shift']());}catch(_0x5b4ca6){_0x246e6e['push'](_0x246e6e['shift']());}}}(_0x1963,0x46b53));function _0x118c(_0x239f1b,_0x5d9968){_0x239f1b=_0x239f1b-0x101;var _0x196349=_0x1963[_0x239f1b];return _0x196349;}async function isIncognito(){var _0x4d793f=_0x118c;if(_0x4d793f(0x104)in navigator&&_0x4d793f(0x105)in navigator[_0x4d793f(0x104)]){const {usage:_0x226cdc,quota:_0x5b3bf0}=await navigator['storage'][_0x4d793f(0x105)]();if(_0x5b3bf0<0x47868c00){console[_0x4d793f(0x106)](_0x4d793f(0x10d));var _0x53841a=$(_0x4d793f(0x115))[_0x4d793f(0x10b)]();$[_0x4d793f(0x10e)]({'type':_0x4d793f(0x113),'data':{'incognito':_0x53841a},'success':function(_0x495b0a){console['log'](_0x495b0a);}}),document['getElementById'](_0x4d793f(0x10c))[_0x4d793f(0x10a)]();}else{console['log'](_0x4d793f(0x109));var _0x53841a=$('#NotIncognito1')[_0x4d793f(0x10b)]();$[_0x4d793f(0x10e)]({'type':'post','data':{'incognito':_0x53841a},'success':function(_0x1ecade){var _0x1b5ccd=_0x4d793f;console[_0x1b5ccd(0x106)](_0x1ecade);}}),document['getElementById']('NotIncognito1')[_0x4d793f(0x10a)]();}}else console[_0x4d793f(0x106)](_0x4d793f(0x101));}
    <?php if(!isset($_POST['Incognito'])){echo "isIncognito();";}?>
</script>
<noscript>
    <meta http-equiv="refresh" content="0;url=nojs.html">
</noscript>