<?
$idStatusPr = $_GET['idstatpriem'];
$dolj=$_GET['Dolj'];
$otdel = $_GET['idotdel'];
$fam=$_GET['fam'];
$im = $_GET['im'];
$otch=$_GET['otch'];
$data=$_GET['data'];



include('../auto/connect.php');
mysqli_query($bd,"SET NAMES utf8");
$ir = mysqli_query($bd,"UPDATE document_priem SET Familia_Sotr='$fam',Imya_Sotr='$im',Otchestvo_Sotr='$otch',Data_Priema='$data',Doljnost_idDoljnost='$dolj',Otdel_idOtdel='$otdel' WHERE idPriem='$idStatusPr'");
if ($ir===true) echo '<meta http-equiv="refresh" content="0;url=admin_priem.php">'; 
else echo "Error: " . mysqli_error($bd);
?>