<!DOCTYPE html>
<html lang="ru">

<head>
    <link rel="stylesheet" href="../style/admin.css?<?echo time();?>">
	<title></title>
</head>
<body>
<?
    include("../auto/connect.php");
    echo "<div class = 'item-holder'>";
    include("../auto/connect.php");
    $r= mysqli_query($bd,"SELECT * FROM `otdel`");
    $myrow= mysqli_fetch_array($r);
    do{
        echo "<div class = 'form-holder'>
            <form  action='updateotdel.php' method = 'post'>
                <div class = 'item'><p>Номер</p><input type='text' name='id' value='$myrow[idOtdel]'> </div>
                <div class = 'item'><p>Отдел</p><input type='text' name = 'otdel' value='$myrow[Naimen_Otdel]' class = 'withed'></div>
                <div class = 'item'>
                <button type='submit' class='btn btn-primary'>Изменить запись</button></div>
                </form>
                <form  action='dropotdel.php' method = 'post' name='f'>
                <div class = 'item'>
                    <button type='submit' name='id'  class='btn btn-primary' value='$myrow[idOtdel]'> Удалить запись</button>
                </div>
            </form>
            </div>";
       
    } while($myrow= mysqli_fetch_array($r));
    echo "</table>";
    echo "<form action='forma_otdel.php' method = 'post'>
    <input type='submit' class = 'btn-primary' name = 'submit' value='Добавить запись'>
    </form>";
?>
</body>
</html>
