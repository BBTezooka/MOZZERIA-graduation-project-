<!DOCTYPE html>
<html lang="ru">

<head>
    <link rel="stylesheet" href="../style/admin.css">
	<title></title>
</head>
<body>
<?
include("../auto/connect.php");
    function draw_osnov($table1){

        include("../auto/connect.php");
        $r=mysqli_query($bd, "select * from otdel;");
        $myrow=mysqli_fetch_array($r);
        
        echo "<td><select name='otdel' id=otdel{$table1} style = 'margin-top: 1rem'>";
        echo "<option value = 'Выбор основания'>Выбор отдела</option>";
        do{
            
            echo "<option value = '$myrow[0]'>$myrow[1]</option>";
        }
        while ($myrow=mysqli_fetch_array($r));
        echo "</select></td>";
    };  
    function draw_iddoc($table2){
    
        include("../auto/connect.php");
        $r=mysqli_query($bd, "select * from doljnost;");
        $myrow=mysqli_fetch_array($r);
        
        echo "<td><select name='dolj' id=dolj{$table2} style = 'margin-top: 1rem'>";
        echo "<option value = 'Выбор сотрудника'>Выбор должности</option>";
        do{
            echo "<option value = '$myrow[0]'>$myrow[1]</option>";
        }
        while ($myrow=mysqli_fetch_array($r));
        echo "</select></td>";
    };  
    $r = mysqli_query($bd,"SELECT * FROM `Doljnost_Needs`");
    $myrow = mysqli_fetch_array($r);  
    $ID=$myrow['idDoljNeed'];
    $table1=$myrow['Otdel_fk'];
    $table2=$myrow['Dolj_fk']; 
?>
<div id='auto-menu'>
<form action='insertdoljneed.php' method = 'post'>
    <div class="card">
        <div class="card-holder">
        <?php
                echo "<div class = 'item'>";
                draw_iddoc($myrow['idDoljNeed']);
                echo "<script>document.querySelector('#dolj", $myrow[0],"').value=$myrow[1]</script>";
                echo "</div>";
                echo "<div class = 'item'>";
                draw_osnov($myrow['idDoljNeed']);
                echo "<script>document.querySelector('#otdel", $myrow[0],"').value=$myrow[3]</script>";
                echo "</div>";
            ?>
            <div class="item"><button type="submit"  name = 'submit' value="">Добавить</button></div>
        </div>
    </div>
</form>
</div>
</body>
</html>