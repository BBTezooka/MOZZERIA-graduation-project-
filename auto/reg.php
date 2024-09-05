<?php
        include('connect.php');
        $login = $_POST['login'];
        $password = $_POST['password'];
        $stat = $_POST['status'];
        $FamLog = $_POST['FamLog'];
        $NameLog = $_POST['NameLog'];
        $OtchLog = $_POST['OtchLog'];
        $queryuser = mysqli_query($bd,"INSERT INTO `autorisation` VALUES (null,'$login','$password',2,'$FamLog','$NameLog', '$OtchLog' )");
        if ($queryuser='true')
        {
            echo '<script>alert("Успешно")</script>';
            echo '<script>document.location.href="auto.php"</script>';
        }
        else echo '<script> alert"уходи"</script>';
   ?>