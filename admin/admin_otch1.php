<!DOCTYPE html>
<html lang="ru">

<head>
    <link rel="stylesheet" href="../style/admin.css?<?echo time();?>">
	<title></title>
</head>
<body>
<?
    include("../auto/connect.php");
    $r= mysqli_query($bd,"SELECT Naimen_Doljnost, count(idPriem) as countIdPriem from doljnost, document_priem where document_priem.Doljnost_idDoljnost = doljnost.idDoljnost group by Naimen_Doljnost;");
    $myrow= mysqli_fetch_array($r);
    echo "<div class = 'otch' id = 'otch'>";
    echo "<p class = 'print'>Кол-во принятых сотрудники на каждую должность</p>";
    do{
        echo "
        <form>
            <div class = 'item'> <input type='text' name='dolj' value='$myrow[Naimen_Doljnost]'><input type='text' name='countpriem' value='$myrow[countIdPriem]'></div>
        </form>";

    } while($myrow= mysqli_fetch_array($r));
    echo "
    <form action='admin_otch1.php' method = 'post' class = 'item'>
        <button type='submit' class = 'btn-success ad' name = 'submit' value='' onClick='ex()'>Печать</button>
    </form>";
    echo " </div>"; 
    echo"<script>
        function ex(){
            window.print()
        }
        </script>
    ";
?>
</body>

</html>