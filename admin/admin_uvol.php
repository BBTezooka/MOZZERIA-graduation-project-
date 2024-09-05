<?
include("../auto/connect.php");
include("ADMIN.php");
function draw_osnov($table4){

    include("../auto/connect.php");
    $r=mysqli_query($bd, "select * from osnovania;");
    $myrow=mysqli_fetch_array($r);
    
    echo "<td><select name='osnov_fk' id=osnov{$table4} style = 'margin-left: -12rem'>";
    // echo "<option value = 'Выбор основания'>Выбор основания</option>";
    do{
        echo "<option value = '$myrow[0]'>$myrow[1]</option>";
    }
    while ($myrow=mysqli_fetch_array($r));
    echo "</select></td>";
};  
function draw_iddoc($table2){

    include("../auto/connect.php");
    $r=mysqli_query($bd, "select * from document_priem;");
    $myrow=mysqli_fetch_array($r);
    
    echo "<td><select name='Document_Priem_idPriem' id=Document_Priem_idPriem{$table2} style = 'margin-left: -14rem'>";
    // echo "<option value = 'Выбор сотрудника'>Выбор сотрудника</option>";
    do{
        echo "<option value = '$myrow[0]'>$myrow[0]</option>";
    }
    while ($myrow=mysqli_fetch_array($r));
    echo "</select></td>";
};  
echo "<div id='auto-menu'>";
$result_dolj= mysqli_query($bd,"SELECT * FROM `osnovania`");
$my_array1 = array('#','Дата увольнения','№ приказа о приеме','Основание');
$r = mysqli_query($bd,"SELECT * FROM `document_yvolnenie`");
$myrow = mysqli_fetch_array($r);
echo"<br>";
echo"<br><h3>Таблица приказов об увольнении</h3><br>";
echo"<table class = 'display nowrap'>";
echo"<thead><tr>";
foreach($my_array1 as $myarr){
    echo"<th>$myarr</th>";
}
echo"</tr></thead></tbody>";
do{
    $ID=$myrow['idYvolnenie'];
    $table1=$myrow['Data_Yvolnenia'];
    $table2=$myrow['Document_Priem_idPriem'];
    $table4=$myrow['Osnovania_FK'];
        echo "<tr>";
        echo "<form action='updateuvol.php' method='post'> ";
        echo "<td><input type='text' name='idYvolnenie' style='width:30px' value='$ID' ></td>"; 
        echo "<td><input type='text' name='Data_Yvolnenia' style='width:110px' value='$table1'></td>"; 
        echo "<td>";
        draw_iddoc($myrow['Document_Priem_idPriem']);
        echo "<script>document.querySelector('#Document_Priem_idPriem", $myrow[2],"').value=$myrow[2]</script>";
        echo "</td>";
        echo "<td>";
        draw_osnov($myrow['Osnovania_FK']);
        echo "<script>document.querySelector('#osnov", $myrow[3],"').value=$myrow[3]</script>";
        echo "</td>";
        echo "
        <td>
            <td><button type='submit' name='idYvolnenie' class='btn btn-primary' value='$myrow[idYvolnenie]'>Изменить</button></td>
        </form></td>";
}

while ($myrow = mysqli_fetch_array($r));
echo "</table>";
echo "<form action='formauvol.php' method = 'post'>
        <input type='submit' class = 'btn-primary' name = 'submit' value='Добавить запись'>
    </form>";
echo"</div>"
?>