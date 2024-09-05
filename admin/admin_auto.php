<!DOCTYPE html>
<html lang="ru">

<head>
    <link rel="stylesheet" href="../style/admin.css?<?echo time();?>">
	<title></title>
</head>
<body>
<?
    include("../auto/connect.php");
    include("../auto/connect.php");
    echo "<div class = 'item-holder'>";
    $r= mysqli_query($bd,"SELECT * FROM `autorisation`, `status` where status_fk = idStatus");
    $myrow= mysqli_fetch_array($r);
    if (mysqli_num_rows($r) > 0){
    do{
        echo "
        <div class = 'form-holder'>
            <form>
            <div class = 'item'><p>Номер</p> <p>$myrow[idAuto]</p></div>
            <div class = 'item'><p>Фамилия</p> <input type='text' value='$myrow[FamLogin]' class = 'input-auto'></div>
            <div class = 'item'><p>Имя</p> <input type='text' value='$myrow[NameLogin]' class = 'input-auto'></div>
            <div class = 'item'><p>Отчество</p> <input type='text' value='$myrow[OtchLogin]' class = 'input-auto'></div>
            <div class = 'item'><p>Логин</p> <input type='text' value='$myrow[login]' class = 'input-auto'></div>
            <div class = 'item'><p>Пароль</p> <input type='password' value='$myrow[password]' class = 'input-auto'></div>
            <div class = 'item'><p>Статус</p> <input type='text' value='$myrow[status]' class = 'input-auto'></div>
            </form>
        </div>";

    } while($myrow= mysqli_fetch_array($r));
    echo "</div>";
    }else {
        echo "<p class = 'sad'>Пока ничего нет ((</p>";
    }
?>
</body>
</html>
