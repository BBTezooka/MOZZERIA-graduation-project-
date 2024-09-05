<?
$data = $_POST['data'];
$Document_Priem_idPriem = $_POST['Document_Priem_idPriem'];
$osnov_fk = $_POST['osnov_fk'];

include("../auto/connect.php");
mysqli_query($bd,'set names utf8');
$ir = mysqli_query($bd,"INSERT INTO `document_yvolnenie`(`Data_Yvolnenia`, `Document_Priem_idPriem`, `Osnovania_FK`) VALUES ('$data','$Document_Priem_idPriem','$osnov_fk')");

if($ir === true){
    echo '<meta http-equiv = "refresh" content = "0; url =  admin_priem.php">';
}else{
    echo "Error: " . mysqli_error($bd);
}
?>