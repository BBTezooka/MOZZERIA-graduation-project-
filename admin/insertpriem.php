<?
$fam = $_POST['fam'];
$name = $_POST['name'];
$otch = $_POST['otch'];
$data = $_POST['data'];
$dolj = $_POST['dolj'];
$otdel = $_POST['otdel'];

include("../auto/connect.php");
mysqli_query($bd,'set names utf8');
$rd = mysqli_query($bd,"SELECT * FROM `doljnost` WHERE `naimen_doljnost` = '$dolj'");
$myrow = mysqli_fetch_array($rd);
$ro = mysqli_query($bd,"SELECT * FROM `otdel` WHERE `naimen_otdel` = '$otdel'");
$myrowotdel = mysqli_fetch_array($ro);
$iddolj =  $myrow['idDoljnost'];
$idotdel = $myrowotdel['idOtdel'];
echo $iddolj;
echo $idotdel;

$ir = mysqli_query($bd,"INSERT INTO `document_priem`(`Familia_Sotr`, `Imya_Sotr`, `Otchestvo_Sotr`, `Data_Priema`, `Doljnost_idDoljnost`, `Otdel_idOtdel`) VALUES ('$fam','$name','$otch','$data','$iddolj','$idotdel')");

if($ir === true){
    echo '<meta http-equiv = "refresh" content = "0; url =  admin_priem.php">';
}else{
    echo '<script type = "text/javascript">alert("Ошибка");</script>';
}
?>