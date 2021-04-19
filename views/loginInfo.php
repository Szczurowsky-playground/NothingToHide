<?php
require_once('views/template/default.php');
?>

<head>
    <title>NothingToHide Framework - Info</title>
    <link href="/public/core/css/form.css" rel="stylesheet">
    <link href="/public/core/css/core.css" rel="stylesheet">
</head>
<div class="wrapper fadeInDown">
    <div id="formContent1">
        <?php if(isset($_COOKIE['nth_val1'])){echo '<h2 class="inactive underlineHover"><a href="/">Home </a></h2>';} ?>
        <?php if(isset($_COOKIE['nth_val1'])){echo '<h2 class="inactive underlineHover"><a href="/logout">Logout </a></h2>';} ?>
        <?php
        if(!isset($_SESSION)){
            session_start();
        }
        ?>

        <h3>Last successfully login data</h3>
        <table class="container">
            <thead>
            <tr>
                <th><h1>Time</h1></th>
                <th><h1>IP</h1></th>
                <th><h1>Browser</h1></th>
                <th><h1>OS</h1></th>
                <th><h1>Incognito mode</h1></th>
                <th><h1>Timezone</h1></th>
                <th><h1>Localization</h1></th>
                <th><h1>Mobile router</h1></th>
                <th><h1>Hosting</h1></th>
                <th><h1>Proxy</h1></th>
                <th><h1>ISP</h1></th>
            </tr>
            </thead>
            <tbody>
            <?php
            require_once('controller/databaseInit.php');
            require_once('model/encryptionClass.php');
            $pdo = setDatabaseConnection();
            $class = new encryption();
            $username = $class->decrypt($_SESSION['username']);
            $stm = $pdo->prepare('SELECT jsondata FROM `nth_logindata` WHERE username = :username ORDER BY ID desc');
            $stm->bindValue('username', $username);
            $stm->execute();
            $result = $stm->fetchAll(PDO::FETCH_ASSOC);
            $i = 0;
            $arrayLength = count($result);
            while($i < $arrayLength){
                $array = $result[$i];
                $json = json_decode($array['jsondata'], true);
                $IPData = $json['IPData'];
                echo '<tr>';
                echo '<td>'. $json['Time'] .'</td>';
                echo '<td>'. $json['IP'] .'</td>';
                echo '<td>'. $json['Browser'] .'</td>';
                echo '<td>'. $json['OS'] .'</td>';
                echo '<td>'. $json['Incognito'] .'</td>';
                echo '<td>'. $json['Timezone'] .'</td>';
                if($IPData['status'] == 'success'){
                    echo '<td><a href="https://www.openstreetmap.org/#map=18/'. $IPData['lat'] .'/'. $IPData['lon'] .'">'. $IPData['continent'] . ',' . $IPData['country'] . ',' . $IPData['city']  .'</a></td>';
                    echo '<td>'. $IPData['mobile'] .'</td>';
                    echo '<td>'. $IPData['hosting'] .'</td>';
                    echo '<td>'. $IPData['proxy'] .'</td>';
                    echo '<td>'. $IPData['isp'] .'</td>';
                }
                else{
                    echo '<td>None</td>';
                    echo '<td>None</td>';
                    echo '<td>None</td>';
                    echo '<td>None</td>';
                    echo '<td>None</td>';
                }
                echo '<tr>';
                $i++;
            }
            ?>
            </tbody>
        </table>

    </div>
</div>

<noscript>
    <meta http-equiv="refresh" content="0;url=nojs.html">
</noscript>