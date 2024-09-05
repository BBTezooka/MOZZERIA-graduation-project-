<?
$famsotr = $_POST['famsotr'];
$namesotr = $_POST['namesotr'];
$otchsotr = $_POST['otchsotr'];
$adress=$_POST['adress'];
$idPriem = $_POST['idPriem'];
$phonenum = $_POST['phonenum'];
$dataroj = $_POST['dataroj'];
$voenob = $_POST['voenob'];

include("../auto/connect.php");
mysqli_query($bd,'set names utf8');
$ir = mysqli_query($bd,"INSERT INTO `dannie_sotrydnika`( `Imya_Sotr`, `Familia_Sotr`, `Otchestvo_Sotr`, `Adress`, `Document_Priem_idPriem`, `Phone_Num`, `data_rojdenia`, `voennoe_obyazatelstvo`) VALUES ('$namesotr','$famsotr','$otchsotr','$adress','$idPriem','$phonenum','$dataroj','$voenob')");

if($ir === true){
    echo '<meta http-equiv = "refresh" content = "0; url =  admin_sotr.php">';
}else{
    '<script type = "text/javascript">alert("Ошибка");</script>';
}
?>