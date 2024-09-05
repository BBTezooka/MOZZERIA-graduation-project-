<?
$idsotr=$_POST['id'];
$famsotr = $_POST['famsotr'];
$namesotr = $_POST['namesotr'];
$otchsotr = $_POST['otchsotr'];
$adress=$_POST['adress'];
$idPriem = $_POST['idPriem'];
$phonenum = $_POST['phonenum'];
$dataroj = $_POST['dataroj'];
$voenob = $_POST['voenob'];

include('../auto/connect.php');
mysqli_query($bd,"SET NAMES utf8");
$ir = mysqli_query($bd,"UPDATE dannie_sotrydnika SET `Imya_Sotr`='$namesotr',`Familia_Sotr`='$famsotr',`Otchestvo_Sotr`='$otchsotr',`Adress`='$adress',`Phone_Num`='$phonenum',`data_rojdenia`='$dataroj',`voennoe_obyazatelstvo`='$voenob'  WHERE idSotr='$idsotr'");
if ($ir===true) echo '<meta http-equiv="refresh" content="0;url=admin_sotr.php">'; 
else "<script type='textr/javascript'>alert('error');</script>";
?>