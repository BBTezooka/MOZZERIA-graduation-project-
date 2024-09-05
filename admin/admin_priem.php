<!DOCTYPE html>
<html lang="ru">

<head>
    <link rel="stylesheet" href="../style/admin.css?<?echo time();?>">
	<title></title>
</head>
<body>
<?
include("../auto/connect.php");
function draw_dolj($table8){
    include("../auto/connect.php");
    $r=mysqli_query($bd, "select * from Doljnost;");
    $myrow=mysqli_fetch_array($r);
    
    echo "<select name='Dolj' id=Dolj{$table8}>";
    do{
    echo "<option value = '$myrow[0]'>$myrow[1]</option>";
    }
    while ($myrow=mysqli_fetch_array($r));
    echo "</select>";
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
$r = mysqli_query($bd,"SELECT * FROM `document_priem`");
$myrow = mysqli_fetch_array($r);
echo "<div class = 'item-holder'>";
if (mysqli_num_rows($r) > 0){
do{
    $ID=$myrow['idPriem'];
    $table1=$myrow['Familia_Sotr'];
    $table2=$myrow['Imya_Sotr'];
    $table4=$myrow['Otchestvo_Sotr'];
    $table7=$myrow['Data_Priema'];
    $table8=$myrow['Doljnost_idDoljnost'];
    $table9=$myrow['Otdel_idOtdel'];
        echo "<div class = 'form-holder'>";
            echo "<form action='updatepriem.php' method='GET'> ";
                echo "<div class = 'item'><p>Номер</p><input type='text' name='id' style='width:50px' value='$ID' ></div>"; 
                echo "<div class = 'item'><p>Фамилия</p><input type='text' name='fam'  value='$table1'></div>"; 
                echo "<div class = 'item'><p>Имя</p><input type='text' name='im'  value='$table2'></div>";
                echo "<div class = 'item'><p>Отчество</p><input type='text' name='otch'  value='$table4'></div>";
                echo "<div class = 'item'><p>Дата приема</p><input type='text' name='data' value='$table7'></div>";;
                echo "<div class = 'item'>
                    <p>Должность</p>";
                    draw_dolj($myrow['Doljnost_idDoljnost']);
                    echo "<script>document.querySelector('#Dolj", $myrow[5],"').value=$myrow[5]</script>";
                echo "</div>";
                echo"<div class = 'item'>
                    <p>Отдел</p>";
                    draw_otdel($myrow['Otdel_idOtdel']);
                    echo "<script>document.querySelector('#Otdel", $myrow[6],"').value=$myrow[6]</script>";
                echo "
                </div>
                <div class = 'item'>
                    <button type='submit' class='btn btn-primary' name='idstatpriem' value='$myrow[idPriem]'>Изменить</button>
                </div>
            </form>
            </div>";

}



while ($myrow = mysqli_fetch_array($r));
}else {
    echo "<p class = 'sad'>Пока ничего нет ((</p>";
};
echo "<form action='forma_priem.php' method = 'post'>
    <input type='submit' class = 'btn-primary' name = 'submit' value='Добавить запись'>
    </form>";
echo"</div>";

?>
</body>
</html>