<?
$id=$_POST['id'];

include("../auto/connect.php");
mysqli_query($bd,'set names utf8');
$ir = mysqli_query($bd,"DELETE FROM dannie_sotrydnika WHERE idSotr='$id'");

if($ir === true){
    echo '<meta http-equiv = "refresh" content = "0; url =  admin_sotr.php">';
}else{
    '<script type = "text/javascript">alert("Ошибка");</script>';
}
?>