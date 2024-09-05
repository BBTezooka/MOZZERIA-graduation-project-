<?
header("Content-type: application/vnd.ms-excel");
header("Content-Disposition: attachment;Filename=ExelPriemSotrudnikaDoc.xls");
header("Contente-Transfer-Encoding: binary");
echo "<meta charset='UTF-8'>";
include("../auto/connect.php");

$sqlz="SELECT * FROM `PriemSotr`, `Doljnost_Needs`, `Otdel`, `Doljnost`, `status_priem`, `autorisation` where Otdel.idOtdel = Doljnost_Needs.Otdel_fk and Doljnost.idDoljnost =Doljnost_Needs.Dolj_fk and PriemSotr.Dolj_fk = Doljnost_Needs.Dolj_fk and PriemSotr.Otdel_fk = Doljnost_Needs.Otdel_fk and PriemSotr.status_priem_fk = status_priem.idStatusPr and idAuto = auto_fk;";
echo "<h2 align='center'>Таблица рассмотрения откликов</h2> ";
$r=mysqli_query($bd,$sqlz);
$myrow=mysqli_fetch_array($r);
echo "<table width='20%' border='1'>";
    echo "<tr>";
    echo "<td>#</td>";
    echo "<td>Фамилия</td>";
    echo "<td>Имя</td>";
    echo "<td>Отчество</td>";
    echo "<td>Работа до нашей компании</td>";
    echo "<td>Сколько по времени работал</td>";
    echo "<td>Образование</td>";
    echo "<td>Доп. Инфо</td>";
    echo "<td>Должность</td>";
    echo "<td>Отдел</td>";
    echo "<td>Статус рассмотрения</td>";
echo "</tr>";

do{
    echo "<tr>";
    echo "<td>$myrow[idPriemSotr]</td>";
    echo "<td>$myrow[FamLogin]</td>";
    echo "<td>$myrow[NameLogin]</td>";
    echo "<td>$myrow[OtchLogin]</td>";
    echo "<td>$myrow[RabotaDoNas]</td>";
    echo "<td>$myrow[KogdaRabotal]</td>";
    echo "<td>$myrow[Obrazovanie]</td>";
    echo "<td>$myrow[DopInfo]</td>";
    echo "<td>$myrow[Naimen_Doljnost]</td>";
    echo "<td>$myrow[Naimen_Otdel]</td>";
    echo "<td>$myrow[status_priem]</td>";
    echo "</tr>";
}
while($myrow=mysqli_fetch_array($r));
echo "</table>";
?>