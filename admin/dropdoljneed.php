<?
$id=$_POST['id'];

include("../auto/connect.php");
mysqli_query($bd,'set names utf8');
$ir = mysqli_query($bd,"DELETE FROM doljnost_needs WHERE idDoljNeed='$id'");

if($ir === true){
    echo '<meta http-equiv = "refresh" content = "0; url =  admin_needDolj.php">';
}else{
    echo '<script type = "text/javascript">alert("Ошибка");</script>';
}
?>
