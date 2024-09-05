<?
    include("ADMIN.php");
    function draw_osnov($table4){

        include("../auto/connect.php");
        $r=mysqli_query($bd, "select * from osnovania;");
        $myrow=mysqli_fetch_array($r);
        
        echo "<td><select name='osnov_fk' id=osnov{$table4} style = 'margin-top: 1rem'>";
        echo "<option value = 'Выбор основания'>Выбор основания</option>";
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
        
        echo "<td><select name='Document_Priem_idPriem' id=osnov{$table2} style = 'margin-top: 1rem'>";
        echo "<option value = 'Выбор сотрудника'>Выбор сотрудника</option>";
        do{
            echo "<option value = '$myrow[0]'>$myrow[0]</option>";
        }
        while ($myrow=mysqli_fetch_array($r));
        echo "</select></td>";
    };  
    $r = mysqli_query($bd,"SELECT * FROM `document_yvolnenie`");
    $myrow = mysqli_fetch_array($r);  
    $ID=$myrow['idYvolnenie'];
    $table1=$myrow['Data_Yvolnenia'];
    $table2=$myrow['Document_Priem_idPriem'];
    $table4=$myrow['Osnovania_FK'];  
?>
<div id='auto-menu'>
<form action='insertuvol.php' method = 'post'>
    <div class="card">
        <div class="card-body">
            <div><p>Дата увольнения</p><input type="text" name="data"></div>
            <?php
                echo "<td>";
                draw_iddoc($myrow['idYvolnenie']);
                echo "<script>document.querySelector('#Document_Priem_idPriem", $myrow[0],"').value=$myrow[1]</script>";
                echo "</td>";
                echo "<td>";
                draw_osnov($myrow['idYvolnenie']);
                echo "<script>document.querySelector('#osnov", $myrow[0],"').value=$myrow[3]</script>";
                echo "</td>";
            ?>
            <div><input type="submit" class="btn btn-primary" name = 'submit' value="Добавить"></div>
        </div>
    </div>
</form>
</div>