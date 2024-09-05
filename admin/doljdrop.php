<?
$id=$_POST['id'];

include("../auto/connect.php");
mysqli_query($bd,'set names utf8');
$ir = mysqli_query($bd,"DELETE FROM doljnost WHERE idDoljnost='$id'");

if($ir === true){
    echo '<meta http-equiv = "refresh" content = "0; url =  admin_dolj.php">';
}else{
    '<script type = "text/javascript">alert("Ошибка");</script>';
}
?>
