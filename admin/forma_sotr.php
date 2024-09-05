<!DOCTYPE html>
<html lang="ru">

<head>
    <link rel="stylesheet" href="../style/admin.css">
	<title></title>
</head>
<body>
<div id='auto-menu'>
<form action='insertsotr.php' method = 'post'>
    <div class="card">
        <div class="card-holder">
            <div class = 'item'><p>Фамилия Сотрудника</p><input type="text" name="famsotr"></div>
            <div class = 'item'><p>Имя Сотрудника</p><input type="text" name="namesotr"></div>
            <div class = 'item'><p>Отчество Сотрудника</p><input type="text" name="otchsotr"></div>
            <div class = 'item'><p>Адресс проживания</p><input type="text" name="adress"></div>
            <div class = 'item'><p>№ Приказа о приеме</p><input type="text" name="idPriem"></div>
            <div class = 'item'><p>Номер телефона</p><input type="text" name="phonenum"></div>
            <div class = 'item'><p>Дата рождения</p><input type="text" name="dataroj"></div>
            <div class = 'item'><p>Военное обязательство</p><input type="text" name="voenob"></div>
            <div class = 'item'><button type="submit" class="btn btn-primary" name = 'submit' value="">Добавить</button></div>
        </div>
    </div>
</form>
</div>
</body>
</html>