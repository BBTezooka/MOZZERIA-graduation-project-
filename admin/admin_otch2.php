<!DOCTYPE html>
<html lang="ru">

<head>
    <link rel="stylesheet" href="../style/admin.css?<?echo time();?>">
	<title></title>
</head>
<body>
<?
    include("../auto/connect.php");
    $r= mysqli_query($bd,"SELECT Naimen_Doljnost, count(idYvolnenie) as countidyvol from doljnost, document_yvolnenie, document_priem where doljnost.Iddoljnost = document_priem.doljnost_iddoljnost and document_priem.idPriem = document_yvolnenie.document_priem_idpriem group by naimen_doljnost;");
    $myrow= mysqli_fetch_array($r);
    echo "<div class = 'otch' id = 'otch'>";
    echo "<p class = 'print'>Кол-во уволенных сотрудников с каждой должности</p>";
    do{
        echo "<tr>
        <form>
            <div class = 'item'> <input type='text' name='dolj' value='$myrow[Naimen_Doljnost]'><input type='text' name='countpriem' value='$myrow[countidyvol]'></div>
        </form>
        "; 
    } while($myrow= mysqli_fetch_array($r));

    echo "
    <form action='admin_otch2.php' method = 'post' class = 'item'>
        <button type='submit' class = 'btn-success ad' name = 'submit' onClick='ex()'>Печать</button>
    </form>";
    echo"</div>";
    echo"<script>
        function ex(){
            window.print()
        }
        </script>
    ";
?>
</body>

</html>