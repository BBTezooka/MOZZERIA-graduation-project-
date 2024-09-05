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
    $r= mysqli_query($bd,"SELECT * FROM `dannie_sotrydnika`");
    $myrow= mysqli_fetch_array($r);
    if (mysqli_num_rows($r) > 0){
    do{
        echo "
        <div class = 'form-holder'>
        <form action='update_sotr.php' method = 'post'>
            <table class = 'tabletwo'>
                <div class = 'item'>
                    <p>Номер</p><input type='text' name='id' class = 'idinput' value='$myrow[idSotr]'>
                </div>
                <div class = 'item'> 
                    <p>Фамилия</p><input type='text' name='famsotr' value='$myrow[Familia_Sotr]'>
                </div>
                <div class = 'item'> 
                    <p>Имя</p><input type='text' name='namesotr' value='$myrow[Imya_Sotr]'>
                </div>
                <div class = 'item'> 
                    <p>Отчество</p><input type='text' name='otchsotr' value='$myrow[Otchestvo_Sotr]'>
                </div>
                <div class = 'item'> 
                    <p>Адрес</p><input type='text' name='adress' value='$myrow[Adress]' class = 'withed'>
                </div>
                <div class = 'item'> 
                    <p>Номер приказа о приеме</p><input type='text' name='idPriem' class = 'idinput' value='$myrow[Document_Priem_idPriem]'>
                </div>
                <div class = 'item'> 
                    <p>Номер телефона</p><input type='text' name='phonenum' value='$myrow[Phone_Num]'>
                </div>
                <div class = 'item'> 
                    <p>Дата рождения</p><input type='text' name='dataroj' value='$myrow[data_rojdenia]'>
                </div>
                <div class = 'item'> 
                    <p>Военное обязательство</p><input type='text' name='voenob' value='$myrow[voennoe_obyazatelstvo]'>
                </div>
                <div class = 'item'>
                    <button type='submit' class='btn btn-primary' value=''>Изменить запись</button>
                </td>
            </table>
        </form>
        <form  action='dropsotr.php' method = 'post' name='f'>
            <td>
                <div class='deleteholder item'>
                    <button type='submit' name='id' class='btn btn-primary' value='$myrow[idSotr]'>Удалить запись</button>
                </div>
            </td>
        </form>
        </div>";
       
    } while($myrow= mysqli_fetch_array($r));
    }else {
        echo "<p class = 'sad'>Пока ничего нет ((</p>";
    }
        //echo 
        //"<form action='forma_sotr.php' method = 'post'>
        //    <input type='submit' class = 'btn-primary' name = 'submit' value='Добавить запись'>
        //</form>";
    echo"</div>";
    
?>
</body>
</html>