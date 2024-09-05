<?
$iddoljneed=$_GET['id'];
$idotdel = $_GET['idotdel'];
$iddolj = $_GET['iddolj'];
$oklad = $_GET['oklad'];
include('../auto/connect.php');
mysqli_query($bd,"SET NAMES utf8");
$ir = mysqli_query($bd,"UPDATE Doljnost_Needs SET Otdel_fk = '$idotdel' ,Dolj_fk = '$iddolj' WHERE idDoljNeed = $iddoljneed");
if ($ir===true) echo '<meta http-equiv="refresh" content="0;url=admin_needDolj.php">'; 
else "<script type='textr/javascript'>alert('error');</script>";
?>