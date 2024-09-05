<?
include('../auto/connect.php');
$idStatusPr = $_REQUEST['idstatpriem'];
$id=$_REQUEST['statuspr_fk'];


if ($id == '1'){
    mysqli_query($bd,"SET NAMES utf8");
    $r = mysqli_query($bd,"SELECT * FROM `PriemSotr` , `Otdel`, `Doljnost`, `autorisation` where Otdel.idOtdel = PriemSotr.Otdel_fk and Doljnost.idDoljnost =PriemSotr.Dolj_fk and idPriemSotr = '$idStatusPr' and auto_fk = idAuto");
    $myrow = mysqli_fetch_array($r);
    $Fam = $myrow['FamLogin'];
    $Im= $myrow['NameLogin'];
    $Otch = $myrow['OtchLogin'];
    $dolj = $myrow['Dolj_fk'];
    $otd = $myrow['Otdel_fk'];
    $iry = mysqli_query($bd,"INSERT INTO `document_priem`(`Familia_Sotr`, `Imya_Sotr`, `Otchestvo_Sotr`, `Doljnost_idDoljnost`, `Otdel_idOtdel`) VALUES ('$Fam','$Im','$Otch','$dolj','$otd')");
    $ir = mysqli_query($bd,"UPDATE PriemSotr SET status_priem_fk='$id' WHERE idPriemSotr='$idStatusPr'");
    if ($ir===true) echo '<meta http-equiv="refresh" content="0;url=admin_priemsotr.php">'; 
    else "<script type='textr/javascript'>alert('error');</script>";
}else{
    $ir = mysqli_query($bd,"UPDATE PriemSotr SET status_priem_fk='$id' WHERE idPriemSotr='$idStatusPr'");
    if ($ir===true) echo '<meta http-equiv="refresh" content="0;url=admin_priemsotr.php">'; 
    else "<script type='textr/javascript'>alert('error');</script>";
}


?>