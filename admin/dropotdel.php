<?
$id=$_POST['id'];

include("../auto/connect.php");
mysqli_query($bd,'set names utf8');
$ir = mysqli_query($bd,"DELETE FROM otdel WHERE idotdel='$id'");

if($ir === true){
    echo '<meta http-equiv = "refresh" content = "0; url =  admin_otdel.php">';
}else{
    '<script type = "text/javascript">alert("Ошибка");</script>';
}
?>