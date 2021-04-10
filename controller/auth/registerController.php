<?php

function validateName(): bool|string
{
    if($_POST['login'] == ''){
        return('Login cann not be empty');
    }
    $login = $_POST['login'];
    if(strlen($login) >= 4){
        if(!preg_match('/[^A-Za-z0-9.#\\-_]/', $login)){
            require_once($_SERVER['DOCUMENT_ROOT'] . '../controller/databaseInit.php');
            $pdo = setDatabaseConnection();
            if($pdo == false){
                return('Error occurred with database connection');
            }
            $stm = $pdo->prepare('SELECT ID FROM `nth_userdata` WHERE username = :login');
            $stm->bindValue('login', $login);
            $stm->execute();
            $result = $stm->fetch(PDO::FETCH_ASSOC);
            if (is_array($result) || is_object($result)) {
                foreach ($result as $key => $loop_result) {
                    if (isset($loop_result) == 1) {
                        return('Login is already used');
                    }
                }
            }
            else{
                return (true);
            }
        }
        else{
            return('Login contains illegal characters');
        }
    }
    else{
        return('Login can not be less than 4 characters');
    }
    return('Something goes wrong');
}

function validatePassword(): bool|string
{
    if(($_POST['password']) == ''){
        return('Password can not be empty');
    }
    if(!strlen($_POST['password']) >= 8){
       return('Password can not be lass than 8 characters');
    }
    if(str_contains(file_get_contents($_SERVER['DOCUMENT_ROOT'] . '../resources/worstPasswords.txt'), $_POST['password'])) {
        return('Password is to weak');
    }
    return(true);

}

function validateAllData(): bool
{
    if (validateName() == 1 && validatePassword() == 1) {
        return(true);
    }
    else {
        return(false);
    }
}
function register(): bool|string
{
    if (validateAllData() == true){
        $pdo = setDatabaseConnection();
        if($pdo == false){
            return('Error occurred with database connection');
        }
        require_once($_SERVER['DOCUMENT_ROOT'] .'/../controller/hashController.php');
        $username = $_POST['login'];
        $password = hashData($_POST['password']);
        $pageUsers = [
            'ID' => '',
            'username' => $username,
            'password' => $password,
        ];
        try{
            $stm = $pdo->prepare('INSERT INTO `nth_userdata` (`ID`, `username`, `password`) VALUES (:ID, :username, :password)')->execute($pageUsers);
            header('Location: /login');
            exit;
        }
        catch (PDOException $e){
            return ($e);
        }
    }
    else{
        return(false);
    }
}

$regError = "";
if (validateName() != 1) {
    $regError = $regError . validateName() . '<br>';
}
if (validatePassword() != 1) {
    $regError = $regError . validatePassword() . '<br>';
}
if (register() != 1) {
    $regError = $regError . register() . '<br>';
}
register();
?>
<form name = 'reg' action='/register' method='POST'>
    <input type='hidden' name='regError' value='<?php echo $regError;?>'>
</form>
<script type='text/javascript'>
    document.reg.submit();
</script>