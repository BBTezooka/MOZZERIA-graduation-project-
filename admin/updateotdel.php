<?
$idotdel=$_POST['id'];
$nameotdel = $_POST['otdel'];

include('../auto/connect.php');
mysqli_query($bd,"SET NAMES utf8");
$ir = mysqli_query($bd,"UPDATE otdel SET Naimen_otdel='$nameotdel' WHERE idOtdel='$idotdel'");
if ($ir===true) echo '<meta http-equiv="refresh" content="0;url=admin_otdel.php">'; 
else "<script type='textr/javascript'>alert('error');</script>";
?>