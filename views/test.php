<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '../controller/databaseInit.php');
$pdo = setDatabaseConnection();
$stm = $pdo->prepare('SELECT jsondata FROM `nth_logindata` WHERE username = :username');
$stm->bindValue('username', 'Kamil', PDO::PARAM_STR);
$stm->execute();
$result = $stm->fetch(PDO::FETCH_ASSOC);
if (is_array($result) || is_object($result)) {
    foreach ($result as $key => $getData) {
    }
}
$json = json_decode($getData, true);
print_r($json);
print_r($_POST);
?>
<form id='NotIncognito1' method='post' action=''>

    <input type="hidden"  name="Incognito" id="Incognito" value="0">
</form>

<form id='Incognito1' method='post' action=''>
        <input type="hidden"  name="Incognito" id="Incognito" value="1">
</form>
<Script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></Script>
<script>
    async function isIncognito(){
        if ('storage' in navigator && 'estimate' in navigator.storage) {
            const {usage, quota} = await navigator.storage.estimate();

            if(quota < 1200000000){
                console.log('Incognito');
                var formData = $("#Incognito1").val();
                $.ajax({
                    type: 'post',
                    data: {'incognito' : formData},
                    success: function( data ) {
                        console.log(data);
                    }
                });
                document.getElementById("Incognito1").submit();
            } else {
                console.log('Not Incognito');
                var formData = $("#NotIncognito1").val();
                $.ajax({
                    type: 'post',
                    data: {'incognito' : formData},
                    success: function( data ) {
                        console.log(data);
                    }
                });
                document.getElementById("NotIncognito1").submit();
            }
        } else {
            console.log('Error');
        }
    }
    <?php if(!isset($_POST['Incognito'])){echo "isIncognito();";}?>
</script>