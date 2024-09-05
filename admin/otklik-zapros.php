<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,300..900;1,300..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css"/>
    <title>Поздравляем!</title>
</head>
<?php
    include('../auto/connect.php');
    $rabotado = $_POST['rabotado'];
    $skoka = $_POST['skoka'];
    $obraz = $_POST['obraz'];
    $dopinfo = $_POST['dopinfo'];
    $doljneed = $_REQUEST['doljnostneed'];
    $idAuto = $_REQUEST['idAuto'];
    $r= mysqli_query($bd,"SELECT * FROM `Doljnost_Needs`, `Otdel`, `Doljnost` where Otdel.idOtdel = Doljnost_Needs.Otdel_fk and Doljnost.idDoljnost =Doljnost_Needs.Dolj_fk and idDoljNeed = '$doljneed'");
    $myrow= mysqli_fetch_array($r);
    $ir= mysqli_query($bd,"SELECT * FROM `autorisation` where idAuto = '$idAuto'");
    $myrowir= mysqli_fetch_array($ir);
    $queryuser = mysqli_query($bd,"INSERT INTO `PriemSotr`(`RabotaDoNas`, `KogdaRabotal`, `Obrazovanie`, `DopInfo`, `Dolj_fk`, `Otdel_fk`, `status_priem_fk`, `auto_fk`) VALUES ('$rabotado','$skoka','$obraz','$dopinfo','$myrow[Dolj_fk]','$myrow[Otdel_fk]',3, '$myrowir[idAuto]')");
    if ($queryuser='true')
    {

    }
    else echo '<script> alert"уходи"</script>';
?>
<style>
    body{ 
        background: url(../assets/div.chalkboard.png) no-repeat;
        height: 97svh;
        font-family: Rubik;
    }
    form h3{
        color: rgb(77, 68, 61);
        font-family: Rubik;
        font-size: 2.3rem;
        font-weight: 800;
        line-height: 3.31rem;
        letter-spacing: 0rem;
        text-align: center;
        text-transform: uppercase;
        margin-top: 3rem;
        margin-bottom: 1rem;
    }

    form h4{
        color: rgb(77, 68, 61);
        font-family: Rubik;
        font-size: 1.8rem;
        font-weight: 800;
        letter-spacing: 0rem;
        line-height: 3.31rem;
        text-align: center;
        text-transform: uppercase;
        margin: 0;
    }

    .wrapper{
        height: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-direction: column;
        position: relative;
    }

    form{
        background: url('../assets/бумага.png') no-repeat;
        background-size: cover;
        width: 42.63rem;
        height: 26.31rem;
        display: flex;
        align-items: center;
        flex-direction: column;
    }
    .cab-btn{
        cursor: pointer;
        color: rgb(77, 68, 61);
        font-family: Rubik;
        font-size: 2rem;
        font-weight: 800;
        line-height: 2.38rem;
        letter-spacing: 0rem;
        text-align: center;
        text-transform: uppercase;
        box-shadow: 0rem 4.38rem 6.25rem -1.56rem rgba(0, 0, 0, 0.5);
        border: 0.38rem solid rgb(77, 68, 61);
        margin-top: 2rem;
        background: none;
        outline: none;
    }
</style>
<body>
    <?php
        $ur = mysqli_query($bd,"SELECT login, password, idAuto, FamLogin, NameLogin, OtchLogin, status_fk, SUBSTRING(NameLogin, 1, 1) AS Initial, SUBSTRING(OtchLogin, 1, 1) AS Initialtwo FROM `autorisation` where `idAuto` = '$idAuto'");
        $myrowur = mysqli_fetch_array($ur);
        $log = $myrowur['login'];
    ?>
    <div class="wrapper">
    <form action="../auto/index.php"  method = 'post'>
            <h3>Ваше резюме отправлено и будет рассмотрено</h3>
            <h4>Статус рассмотрения вы можете узнать в личном кабинете</h4>
            <?php echo "<input type = 'text' name = 'login' value = '$log' style = 'display:none '></input>" ?>
            <button type = 'submit' class = 'cab-btn'>Вернуться на главную</button>
        </form>
    </div>
</body>

</html>
