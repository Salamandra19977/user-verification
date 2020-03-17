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
<br>
<div class="container">
    <div class="row">
        <div class="form-group row">
            <div class="col-md-6">
                <a class="btn btn-primary" href="/userverification">Главная</a>
            </div>
        </div>
        <form style="width: 100%" method="post" onsubmit="sendData();return false;" id="formNews" >

            <div class="form-group row">
                <label id="message" for="message" class="col-md-12 col-form-label"></label>
            </div>

            <div class="form-group row">
                <label for="fullname" class="col-md-2 col-form-label">Полное имя</label>
                <div class="col-md-10">
                    <input
                        type="text"
                        class="form-control"
                        id="fullname"
                        name="fullname"
                        value=""
                    >
                    <div class="invalid-feedback"></div>
                </div>
            </div>

            <div class="form-group row">
                <label for="email" class="col-md-2 col-form-label">Email</label>
                <div class="col-md-10">
                    <input
                        type="text"
                        class="form-control"
                        id="email"
                        name="email"
                        value=""
                    >
                    <div class="invalid-feedback"></div>
                </div>
            </div>

            <div class="form-group row">
                <label for="city" class="col-md-2 col-form-label">Город</label>
                <div class="col-md-10">
                    <input
                        type="text"
                        class="form-control"
                        id="city"
                        name="city"
                        value=""
                    >
                    <div class="invalid-feedback"></div>
                </div>
            </div>

            <div class="form-group row">
                <label for="password" class="col-md-2 col-form-label">Пароль</label>
                <div class="col-md-10">
                    <input
                        type="password"
                        class="form-control"
                        id="password"
                        name="password"
                        value=""
                    >
                    <div class="invalid-feedback"></div>
                </div>
            </div>

            <div class="form-group row">
                <label for="password_two" class="col-md-2 col-form-label">Повторите пароль</label>
                <div class="col-md-10">
                    <input
                        type="password"
                        class="form-control"
                        id="password_two"
                        name="password_two"
                        value=""
                    >
                    <div class="invalid-feedback"></div>
                </div>
            </div>

            <div class="form-group row">
                <div class="col-md-6">
                    <button type="submit" class="btn btn-primary">Зарегистрироваться</button>
                </div>
            </div>
        </form>


        <style>
            .error{border-color:red;}
            li{
                background-color: #ffff99;
                margin-bottom: 5px;
                padding: 8px;
            }
            #message {
                color: crimson;
            }
        </style>

        <script type="text/javascript">
            function sendData()
            {
                let form = '#formNews';
                let dataForm = $(form).serialize();
                $('*', form).removeClass('error');
                $('.invalid-feedback').empty();

                $.ajax({
                    url: 'request.signup.php', //куда отправить данные
                    type: 'POST',
                    dataType: 'json',
                    data: dataForm, // данные для отправки
                    success: function(responce){//метод который выполняется когда
                        //пришел ответ от сервера
                        console.log(responce);
                        if(typeof(responce) != "string"){
                            for(key in responce)
                            {
                                $(`[name="${key}"]`, form).addClass('error');
                                $(`[name="${key}"]`, form).siblings('.invalid-feedback')
                                    .html( responce[key]
                                        .join("<br>") )
                                    .show();
                            }
                        }
                        else {
                            $('#message').text(responce);
                            window.location.href = "/userverification/login.php"
                        }
                    }
                })
            }
        </script>
    </div>
</div>
</body>
</html>