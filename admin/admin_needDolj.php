<?
include("../auto/connect.php");
    function draw_dolj($table8){
        include("../auto/connect.php");
        $r=mysqli_query($bd, "select * from Doljnost;");
        $myrow=mysqli_fetch_array($r);
        
        echo "<td><select name='iddolj' id=Dolj{$table8}>";
        do{
        echo "<option value = '$myrow[0]'>$myrow[1]</option>";
        }
        while ($myrow=mysqli_fetch_array($r));
        echo "</select></td>";
    };  
    
    function draw_otdel($table9) {
        include("../auto/connect.php");
        $r = mysqli_query($bd, "select * from Otdel;");
        
        echo "<td><select name='idotdel' id='Otdel{$table9}'>";
        while ($myrow = mysqli_fetch_array($r)) {
            echo "<option value='$myrow[0]'";
            if ($myrow[0] == $table9) {
                echo " selected";
            }
            echo ">$myrow[1]</option>";
        }
        echo "</select></td>";
    };
    $result_dolj= mysqli_query($bd,"SELECT * FROM `doljnost`");
    $result_otdel= mysqli_query($bd,"SELECT * FROM `otdel`");
    $r = mysqli_query($bd,"SELECT * FROM `doljnost_needs`");
    $myrow = mysqli_fetch_array($r);
    $ID=$myrow['idDoljNeed'];
    $table8=$myrow['Dolj_fk'];
    $table9=$myrow['Otdel_fk'];
?>
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
    include("../auto/connect.php");
    $r= mysqli_query($bd,"SELECT * FROM `Doljnost_Needs`, `Otdel`, `Doljnost` where Otdel.idOtdel = Doljnost_Needs.Otdel_fk and Doljnost.idDoljnost =Doljnost_Needs.Dolj_fk ");
    $myrow= mysqli_fetch_array($r);
    do{
        echo "
        
        <div class = 'form-holder'>
        <form  action='updateneeddolj.php' method = 'get'>
        <div class = 'item'>
            <p>Номер</p><input type='text' name='id' value='$myrow[idDoljNeed]'>
        </div>";
            echo "<div class = 'item'>
                <p>Должность</p>";
            draw_dolj($myrow['Dolj_fk']);
            echo "<script>document.querySelector('#Dolj", $myrow[2],"').value=$myrow[2]</script>";
            echo "</div>";
            echo "<div class = 'item'>
                <p>Отдел</p>";
            draw_otdel($myrow['Otdel_fk']);
            echo "<script>document.querySelector('#Otdel", $myrow[1],"').value=$myrow[1]</script>";
            echo "</div>
            <div class = 'item'>
                <button type='submit' class='btn btn-primary' value=''>Изменить запись </button>
                <div>
                </div>
            </div>
        </form>
        <form  action='dropdoljneed.php' method = 'post' name='f' class = 'item'>
            <button type='submit' name='id' class='btn btn-primary' value='$myrow[idDoljNeed]'>Удалить</button>
        </form>
        </div>";
       
    } while($myrow= mysqli_fetch_array($r));
    echo "<form action='forma_doljneed.php' method = 'post'>
    <input type='submit' class = 'btn-primary' name = 'submit' value='Добавить запись'>
    </form>";
?>

</body>
</html>