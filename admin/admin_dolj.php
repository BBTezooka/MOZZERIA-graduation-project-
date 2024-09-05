<!DOCTYPE html>
<html lang="ru">

<head>
    <link rel="stylesheet" href="../style/admin.css ?<?echo time();?>">
	<title></title>
</head>
<body>
<?
    include("../auto/connect.php");
    echo "<div class = 'item-holder'>";
    $r= mysqli_query($bd,"SELECT * FROM `doljnost`");
    $myrow= mysqli_fetch_array($r);
    do{
        echo "
        <div class = 'form-holder'>
            <form  action='updatedolj.php' method = 'post'>
                <div class = 'item'><p>Номер</p><input type='text' name='id' value='$myrow[idDoljnost]'> </div>
                <div class = 'item'><p>Должность</p> <input type='text' name='dolj' value='$myrow[Naimen_Doljnost]'></div>
                <div class = 'item'><p>Оклад</p> <input type='text' name='oklad' value='$myrow[Oklad]'></div>
                <div class = 'item buttons-holder'>
                    <button type='submit' class='btn btn-primary'>
                        Изменить запись
                    </button>
                </div>
            </form>
            <form  action='doljdrop.php' method = 'post' name='f' class = 'item'>
                <button type='submit' name='id' class='btn btn-primary' value='$myrow[idDoljnost]'>Удалить</button>
            </form>
        </div>"; 
     
    } while($myrow= mysqli_fetch_array($r));
    echo "<form action='forma_dolj.php' method = 'post'>
            <input type='submit' class = 'btn-primary' name = 'submit' value='Добавить запись'>
    </form>";
    echo "</div>";

?>
</body>
</html>
