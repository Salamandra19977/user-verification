<?php
session_start();
require_once "request.class.php";
require_once "pdo/database.php";
$requestClas = new Request();
$objDatabase = new Database();
if( $requestClas->isPost() )
{
    foreach ($_POST as $key => $value) {
        $requestClas->required($key);
    }
    if(!empty($requestClas->getErrors())){
        echo json_encode($requestClas->getErrors());
    }
    else {
        if($objDatabase->searchEmail($requestClas->getField('email')) == false){
            echo json_encode("Пользователь не найден с таким email");
        }
        else {
            if(md5($requestClas->getField('password')) == $objDatabase->getHash($requestClas->getField('email'))['password']){
                echo json_encode("Авторизовались!");
                $_SESSION['email'] = $requestClas->getField('email');
            }
            else{
                echo json_encode("Не верный пароль");
            }
        }
    }
}
?>