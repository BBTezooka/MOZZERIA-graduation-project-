<?
$namedolj = $_POST['dolj'];
$oklad = $_POST['oklad'];

include("../auto/connect.php");
mysqli_query($bd,'set names utf8');
$ir = mysqli_query($bd,"INSERT INTO `doljnost` (`Naimen_Doljnost`, `Oklad`) VALUES ('$namedolj','$oklad')");

if($ir === true){
    echo '<meta http-equiv = "refresh" content = "0; url =  admin_dolj.php">';
}else{
    '<script type = "text/javascript">alert("Ошибка");</script>';
}
?>