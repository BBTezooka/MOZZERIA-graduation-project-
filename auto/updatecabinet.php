<?
$id = $_POST['idPriemSotr'];
$FamPriem=$_POST['FamPriem'];
$NamePriem = $_POST['NamePriem'];
$OtchPriem=$_POST['OtchPriem'];
$RabotaDoNas = $_POST['RabotaDoNas'];
$KogdaRabotal=$_POST['KogdaRabotal'];
$Obrazovanie = $_POST['Obrazovanie'];
$DopInfo=$_POST['DopInfo'];
include('connect.php');
mysqli_query($bd,"SET NAMES utf8");
$ir = mysqli_query($bd,"UPDATE PriemSotr SET `RabotaDoNas`='$RabotaDoNas',`KogdaRabotal`='$KogdaRabotal',`Obrazovanie`='$Obrazovanie',`DopInfo`='$DopInfo' WHERE idPriemSotr='$id'");
if ($ir===true) {
    echo "<script>history.back()</script>";
}
else echo "<script type='textr/javascript'>alert('error');</script>";
?>