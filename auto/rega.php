<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,300..900;1,300..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css"/>
    <link rel="stylesheet" href="reg.css">
    <title>Document</title>
</head>
<body>
    <div class="wrapper">
        <div class="regestration-css">
            <form action="reg.php" method="post">
                <h3 class="text-center">Регистрация</h3>
                <div class="form-group">
                    <input class="form-control item" type="text" name="FamLog" placeholder="Фамилия" required>
                </div>
                <div class="form-group">
                    <input class="form-control item" type="text" name="NameLog" placeholder="Имя" required>
                </div>
                <div class="form-group">
                    <input class="form-control item" type="text" name="OtchLog" placeholder="Отчество" required>
                </div>
                <div class="form-group">
                    <input class="form-control item" type="text" name="login" placeholder="Логин" required>
                </div>
                <div class="buttons">
                    <input class="form-control item" type="password" name="password" placeholder="Пароль" required>
                </div>
                <button class = "btn-account" type = "submit">Зарегистрироваться</button>
            </form>
        </div>
        <div class="tomato">
        <img src="../assets/помидоры.png" alt="" class = 'vegy-animation'>
    </div>
    <div class="olives">
        <img src="../assets/оливки.png" alt="" class = 'vegy-animation'>
    </div>
    </div>

</body>
</html>