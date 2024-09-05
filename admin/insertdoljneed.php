<?
$dolj = $_POST['dolj'];
$otdel = $_POST['otdel'];

include("../auto/connect.php");
mysqli_query($bd,'set names utf8');
$ir = mysqli_query($bd,"INSERT INTO `Doljnost_Needs` (`Dolj_fk`, `Otdel_fk`) VALUES ($dolj,$otdel)");

if($ir === true){
    echo '<meta http-equiv = "refresh" content = "0; url =  admin_needDolj.php">';
}else{
    '<script type = "text/javascript">alert("Ошибка");</script>';
}
?>