<?php
session_start();
require_once "pdo/database.php";
$objDatabase = new Database();
if (isset($_POST['exit']))
{
    session_destroy();
    header("Location: /userverification");
}
else{
    if(isset($_SESSION['email'])){
        $data = $objDatabase->getAll($_SESSION['email']);
        echo "Имя: ".$data['fullname'].'<br>';
        echo "Город: ".$data['city'].'<br>';
        echo "Email: ".$data['email'].'<br>';
    }
    else {
        header("Location: /userverification");
    }
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
</head>
<body>
    <form action="" method="post" id="formExit" >
        <input class="btn btn-primary" name="exit" type="submit" value="Выйти"/>
    </form>
</div>
</body>
</html>