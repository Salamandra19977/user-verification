<?php
require_once "request.class.php";
require_once "pdo/database.php";
$requestClas = new Request();
$objDatabase = new Database();
$data = [];
if( $requestClas->isPost() )
{
    foreach ($_POST as $key => $value) {
        $requestClas->required($key);
    }
    $requestClas->checkPassword('password', 'password_two');
    $requestClas->min('password',6);
    if(!empty($requestClas->getErrors())){
        echo json_encode($requestClas->getErrors());
    }
    else {
        $data['fullname'] = $requestClas->getField('fullname');
        $data['email'] = $requestClas->getField('email');
        $data['city'] = $requestClas->getField('city');
        $data['password'] = md5($requestClas->getField('password'));
        if($objDatabase->searchEmail($requestClas->getField('email')) == false){
            $objDatabase->insert($data);
            echo json_encode("Зарегистрировались!");
        }
        else {
            echo json_encode("Уже существует пользователь с такой почтой!");
        }
    }
}
?>