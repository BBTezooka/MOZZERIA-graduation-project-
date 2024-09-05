<!DOCTYPE html>
<html lang="ru">

<head>
    <link rel="stylesheet" href="../style/admin.css?<?echo time();?>">
	<title></title>
</head>
<body>
<?
include("../auto/connect.php");
function draw_stat($table11){
    include("../auto/connect.php");
    $r=mysqli_query($bd, "select * from status_priem;");
    $myrow=mysqli_fetch_array($r);
    
    echo "<select name='statuspr_fk' id=stat{$table11}>";
    do{
    echo "<option value = '$myrow[0]'>$myrow[1]</option>";
    }
    while ($myrow=mysqli_fetch_array($r));
    echo "</select>";
};  
$r = mysqli_query($bd,"SELECT * FROM `PriemSotr`, `Otdel`, `Doljnost`, `status_priem`, `autorisation` where Otdel.idOtdel = PriemSotr.Otdel_fk and Doljnost.idDoljnost =PriemSotr.Dolj_fk and PriemSotr.status_priem_fk = status_priem.idStatusPr and idAuto = auto_fk;");
$myrow = mysqli_fetch_array($r);
echo "<div class = 'item-holder'>";
if (mysqli_num_rows($r) > 0){
do{
    $ID=$myrow['idPriemSotr'];
    $table1=$myrow['FamLogin'];
    $table2=$myrow['NameLogin'];
    $table4=$myrow['OtchLogin'];
    $table5=$myrow['RabotaDoNas'];
    $table6=$myrow['KogdaRabotal'];
    $table7=$myrow['Obrazovanie'];
    $table8=$myrow['DopInfo'];
    $table9=$myrow['Naimen_Doljnost'];
    $table10=$myrow['Naimen_Otdel'];
    $table11=$myrow['idDoljnost'];
    $table12=$myrow['idOtdel'];
    $table13=$myrow['status_priem'];

    echo "<div class = 'form-holder'>";
        echo "<form action='updatepriemsotr.php' method='POST'> ";
            echo "<div class = 'item'><p>Номер</p><p name='ID[$ID]'>$ID</p></div>"; 
            echo "<div class = 'item'><p>Фамилия</p><p name='famlogin'>$table1</p></div>"; 
            echo "<div class = 'item'><p>Имя</p><p name='namelogin'>$table2</p></div>";
            echo "<div class = 'item'><p>Отчество</p><p name='otchlogin'>$table4</p></div>"; 
            echo "<div class = 'item'><p>Работа до нас</p><p name='table5[$ID]'>$table5</p></div>";
            echo "<div class = 'item'><p>Когда работал</p><p name='table6[$ID]'>$table6</p></div>"; 
            echo "<div class = 'item'><p>Образование</p><p name='table7[$ID]'>$table7</p></div>"; 
            echo "<div class = 'item'><p>Доп. инфо</p><p name='table8[$ID]'>$table8</p></div>";
            echo "<div class = 'item'><p>Должность</p><p name='naimen_dolj'>$table9</p></div>"; 
            echo "<div class = 'item'><p>Отдел</p><p name='naimen_otdel'>$table10</p></div>"; 
            echo "<div class = 'item'>
            <p>Статус приема</p>";
            draw_stat($myrow['idPriemSotr']);
            echo "<script>document.querySelector('#stat", $myrow[0],"').value=$myrow[7]</script>";
            echo "</div>";
            echo "
            <div class = 'item'>
                <td><button type='submit' name='idstatpriem' class='btn btn-primary' value='$myrow[idPriemSotr]'/>Изменить</button></td>
                <td><p name='id_otdel' style='width:1rem; height: 4rem; display:none; justify-content:center; text-align:center'>$table12</p></td> 
                <td><p name='id_dolj' style='width:1rem; height: 4rem; display:none; justify-content:center; text-align:center'>$table11</p></td> 
            </div>
        </form>
        </div>";
    } 
    while ($myrow = mysqli_fetch_array($r));
    }else {
        echo "<p class = 'sad'>Пока ничего нет ((</p>";
    };
?>
</body>
</html>