<!DOCTYPE html>
<html lang="ru">

<head>
    <link rel="stylesheet" href="../style/admin.css">
	<title></title>
</head>
<body>
<div id='auto-menu'>
<form action='insertpriem.php' method = 'post'>
    <div class="card">
        <div class="card-holder">
            <div class = 'item'><p>Фамилия</p><input type="text" name="fam"></div>
            <div class = 'item'><p>Имя</p><input type="text" name="name"></div>
            <div class = 'item'><p>Отчество</p><input type="text" name="otch"></div>
            <div class = 'item'><p>Дата приема</p><input type="text" name="data"></div>
            <div class = 'item'><p>Должность</p><input type="text" name="dolj"></div>
            <div class = 'item'><p>Отдел</p><input type="text" name="otdel"></div>
            <div class = 'item'><button type="submit" class="btn btn-primary" name = 'submit' value="">Добавить</button></div>
        </div>
    </div>
</form>
</div>
</body>
</html>