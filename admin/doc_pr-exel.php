<?
header("Content-type: application/vnd.ms-excel");
header("Content-Disposition: attachment;Filename=ExelPriemDoc.xls");
header("Contente-Transfer-Encoding: binary");
echo "<meta charset='UTF-8'>";
include("../auto/connect.php");

$sqlz="SELECT idPriem,Familia_Sotr,Imya_Sotr,Otchestvo_Sotr,Data_Priema,Doljnost.Naimen_Doljnost, Otdel.Naimen_Otdel from document_priem,doljnost,otdel WHERE document_priem.Doljnost_idDoljnost=doljnost.idDoljnost and document_priem.Otdel_idOtdel = Otdel.idOtdel;";
echo "<h2 align='center'>Таблица приёма</h2> ";
$r=mysqli_query($bd,$sqlz);
$myrow=mysqli_fetch_array($r);
echo "<table width='20%' border='1'>";
    echo "<tr>";
    echo "<td>#</td>";
    echo "<td>Фамилия</td>";
    echo "<td>Имя</td>";
    echo "<td>Отчество</td>";
    echo "<td>Дата приёма</td>";
    echo "<td>Должность</td>";
    echo "<td>Отдел</td>";
echo "</tr>";

do{
    echo "<tr>";
    echo "<td>$myrow[idPriem]</td>";
    echo "<td>$myrow[Familia_Sotr]</td>";
    echo "<td>$myrow[Imya_Sotr]</td>";
    echo "<td>$myrow[Otchestvo_Sotr]</td>";
    echo "<td>$myrow[Data_Priema]</td>";
    echo "<td>$myrow[Naimen_Doljnost]</td>";
    echo "<td>$myrow[Naimen_Otdel]</td>";
    echo "</tr>";
}
while($myrow=mysqli_fetch_array($r));
echo "</table>";
?>