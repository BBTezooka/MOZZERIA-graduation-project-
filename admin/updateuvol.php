<?
$ID=$_POST['idYvolnenie'];
$table1=$_POST['Data_Yvolnenia'];
$table2=$_POST['Document_Priem_idPriem'];
$table4=$_POST['osnov_fk'];

include('../auto/connect.php');
mysqli_query($bd,"SET NAMES utf8");
$ir = mysqli_query($bd,"UPDATE document_yvolnenie SET `Data_Yvolnenia`= '$table1',`Document_Priem_idPriem`= '$table2',`Osnovania_FK`= '$table4'  WHERE  idYvolnenie='$ID'");
if ($ir===true) echo '<meta http-equiv="refresh" content="0;url=admin_uvol.php">'; 
else echo "<script type='textr/javascript'>alert('error');</script>";
?>