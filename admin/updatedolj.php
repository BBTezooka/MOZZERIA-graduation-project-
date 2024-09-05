<?
$iddolj=$_POST['id'];
$namedolj = $_POST['dolj'];
$oklad = $_POST['oklad'];

include('../auto/connect.php');
mysqli_query($bd,"SET NAMES utf8");
$ir = mysqli_query($bd,"UPDATE doljnost SET Naimen_Doljnost='$namedolj',Oklad='$oklad' WHERE idDoljnost='$iddolj'");
if ($ir===true) echo '<meta http-equiv="refresh" content="0;url=admin_dolj.php">'; 
else "<script type='textr/javascript'>alert('error');</script>";
?>