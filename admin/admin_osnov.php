<?
    include("../auto/connect.php");
    include("ADMIN.php");
    echo "<div id='auto-menu'>";
    echo "<h2>Основания</h2> <br>";
    echo "<table class = 'table'>";
    echo "<tr> <th scope='col'>#</th> <th scope='col'>Основание</th></tr>";
    include("../auto/connect.php");
    $r= mysqli_query($bd,"SELECT * FROM `Osnovania`");
    $myrow= mysqli_fetch_array($r);
    do{
        echo "<tr>
        <form>
        <td>$myrow[idOsnovania] </td>
        <td> <input type='text' value='$myrow[Osnovanie]' class = 'withed'></td>
        </form>
        ";
       
    } while($myrow= mysqli_fetch_array($r));
    echo "</table>";
    echo"</div>";
?>