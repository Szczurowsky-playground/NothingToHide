<?php
if(!isset($_SESSION)){
    session_start();
}
require_once($_SERVER['DOCUMENT_ROOT'] . '../controller/databaseInit.php');

function validateLogin(): bool
{
    if($_POST['login'] == ''){
        return(false);
    }
    if(preg_match('/[^A-Za-z0-9.#\\-_]/', $_POST['login'])){
        return(false);
    }
    $username = $_POST['login'];
    $pdo = setDatabaseConnection();
    $stm = $pdo->prepare('SELECT ID FROM `nth_userdata` WHERE username = :username');
    $stm->bindValue('username', $username);
    $stm->execute();
    $result = $stm->fetch(PDO::FETCH_ASSOC);
    if (is_array($result) || is_object($result)) {
        foreach ($result as $key => $loop_result) {
            if (isset($loop_result) == 1) {
                return(true);
            }
        }
    }
    else{
        return (false);
    }

}

function validate(): bool
{
    require_once($_SERVER['DOCUMENT_ROOT'] .'/../controller/hashController.php');
    require_once($_SERVER['DOCUMENT_ROOT'] . '/../model/encryptionClass.php');
    if($_POST['password'] == ''){
        return(false);
    }
    if(validateLogin() == true){
        $username = $_POST['login'];
        $password = $_POST['password'];
        $pdo = setDatabaseConnection();
        $stm = $pdo->prepare('SELECT password FROM `nth_userdata` WHERE username = :username');
        $stm->bindValue('username', $username, PDO::PARAM_STR);
        $stm->execute();
        $result = $stm->fetch(PDO::FETCH_ASSOC);
        if (is_array($result) || is_object($result)) {
            foreach ($result as $key => $getPassword) {
            }
            if(password_verify($password, $getPassword)){
                $encryptModel = new encryption();
                $encryptedUsername = $encryptModel->encrypt($username);
                $_SESSION['username'] = $encryptedUsername;
                setcookie('nth_val1', $encryptedUsername, time()+(86400 * 30), '/', secure:false); // TODO Make it true, now false for dev purposes
                addToLog($username, true);
                require_once($_SERVER['DOCUMENT_ROOT'] . '/../model/sessionClass.php');
                $sessionClass = new session();
                $sessionClass->addSession($username);
                return(true);
            }
            else{
                addToLog($username, false);
                return(false);
            }
        }
        else{
            addToLog($username, false);
            return(false);
        }
    }
    else{
        return(false);
    }
}

function addToLog($username, $passwordOk){
    require_once($_SERVER['DOCUMENT_ROOT'] . '/../model/sessionClass.php');
    $sessionClass = new session();
    $date = date("Y/m/d");
    $hour = date("H:i:s");
    $userIP = $sessionClass->getIP();
    $loginLogs =[
        'ID' => '',
        'username' => $username,
        'passOk' => $passwordOk,
        'p2fa' => "",
        'ip' => $userIP,
        'date' => $date,
        'hour' => $hour,
        'wasSucc' => '',
    ];
    $pdo = setDatabaseConnection();
    $stm = $pdo->prepare("INSERT INTO `nth_loginlogs` (`ID`, `username`, `IP`, `date`, `hour`, `passwordOk`, `passed2fa`, `wasSuccessful`) VALUES (:ID, :username, :ip, :date, :hour, :passOk, :p2fa, :wasSucc);");
    $stm->execute($loginLogs);
    if ($passwordOk == 1){ // TODO There i will change is for wasSucc but actually there's no 2FA feature
        $browser = get_browser(null, true);
        $url = 'http://ip-api.com/json/'. $userIP .'?fields=18080465';
        $json = file_get_contents($url);
        $IPData = json_decode($json, true);
        $loginData =[
            'Time' => $date . ' ' .$hour,
            'IP' => $userIP,
            'Incognito' => $_POST['userIncognito'],
            'Browser' => $browser['parent'],
            'OS' => $browser['platform'],
            'Timezone'=> $_POST['userTimezone'],
            'IPData' => $IPData,
        ];
        $json = json_encode($loginData, true);
        $loginDataToSQL =[
            'ID' => '',
            'username' => $username,
            'jsondata' => $json,
        ];
        $pdo = setDatabaseConnection();
        $stm = $pdo->prepare("INSERT INTO `nth_logindata` (`ID`, `username`, `jsondata`) VALUES (:ID, :username, :jsondata);");
        $stm->execute($loginDataToSQL);
    }
}

if (validate() == 1) {
    header('Location: /');
    exit;
}
else {
    $logError = 'Password or username are incorrect';
}

?>
<form name = 'log' action='/login' method='POST'>
    <input type='hidden' name='logError' value='<?php echo $logError;?>'>
</form>
<script type='text/javascript'>
    document.log.submit();
</script>
