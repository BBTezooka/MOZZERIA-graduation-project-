
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Анкета</title>
</head>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&family=Rubik:ital,wght@0,300..900;1,300..900&display=swap');
    *{
        margin: 0;
        box-sizing: border-box;
        font-family: Rubik;
    }

    body::-webkit-scrollbar {
        width: 0px;               /* ширина всей полосы прокрутки */
    }

    body{
        height: 98svh;
        background: url(../assets/div.chalkboard.png);
    }

    .regestration-css{
        width: 100%;
        height: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
    }

    .regestration-css form{
        background: url(../assets/admincard.png);
        background-size:cover;
        width: 43.31rem;
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
    }
    .regestration-css form h3{
        color: rgb(77, 68, 61);
        font-family: Rubik;
        font-size: 2rem;
        font-weight: 800;
        line-height: 2.38rem;
        letter-spacing: 0rem;
        text-align: center;
        text-transform: uppercase;
    }

    .form-group{
        color: rgb(77, 68, 61);
        font-family: Rubik;
        font-size: 1.5rem;
        font-weight: 400;
        line-height: 1.75rem;
        letter-spacing: 0rem;
        text-align: center;
    }

    .form-group input{
        color: rgb(31, 31, 31);
        font-family: Rubik;
        font-size: 1.5rem;
        font-weight: 400;
        line-height: 1.75rem;
        letter-spacing: 0rem;
        text-align: left;
        box-sizing: border-box;
        border: 0.38rem solid rgb(77, 68, 61);
        background: transparent;
        padding: .6rem;
        margin: .6rem;
        width: 25rem;
        outline: none;
    }

    input:-webkit-autofill,
    input:-webkit-autofill:hover,   
    input:-webkit-autofill:focus,
    input:-webkit-autofill:active {
        transition: background-color 5000s ease-in-out 0s;
    }

    .form-group input::placeholder{
        color: rgba(77, 68, 61, 0.5);
    }
    
     button{
        color: rgb(77, 68, 61);
        font-family: Rubik;
        font-size: 1.5rem;
        font-weight: 800;
        line-height: 1.75rem;
        letter-spacing: 0rem;
        text-align: center;
        text-transform: uppercase;
        box-sizing: border-box;
        border: 0.38rem solid rgb(77, 68, 61);
        background: transparent;
        margin: .6rem;
        outline: none;
        cursor: pointer;
    }
    
</style>
<body>
    <div class="regestration-css">
        <?
            include('../auto/connect.php');
            $doljneed = $_REQUEST['doljnostneed'];
            $idAuto = $_REQUEST['idAuto'];
            mysqli_query($bd,'set names utf8');
            $r= mysqli_query($bd,"SELECT * FROM `autorisation` where idAuto = '$idAuto'");
            $myrow= mysqli_fetch_array($r);
            $FamLog = $myrow['FamLogin'];
            $ir= mysqli_query($bd,"SELECT * FROM `Doljnost_Needs`, `Otdel`, `Doljnost` where Otdel.idOtdel = Doljnost_Needs.Otdel_fk and Doljnost.idDoljnost =Doljnost_Needs.Dolj_fk and idDoljNeed = '$doljneed'");
            $myrowir= mysqli_fetch_array($ir);
            echo "
                <form action='otklik-zapros.php' method='post'>
                <h3 class='text-center'>Поздравляем! Осталось всего несколько шагов</h3>
                    <div class='form-group'>
                        <p>Фамилия: $myrow[FamLogin]</p>
                    </div>
                    <div class='form-group'>
                        <p>Имя: $myrow[NameLogin]</p>
                    </div>
                    <div class='form-group'>
                        <p>Отчество: $myrow[OtchLogin]</p>
                    </div>
                    <div class='form-group'>
                        <input class='form-control item' type='text' name='rabotado' placeholder='Где работали' required>
                    </div>
                    <div class='form-group'>
                        <input class='form-control item' type='text' name='skoka' placeholder='Сколько работали' required>
                    </div>
                    <div class='form-group'>
                        <input class='form-control item' type='text' name='obraz' placeholder='Образование' required>
                    </div>
                    <div class='form-group'>
                        <input class='form-control item' type='text' name='dopinfo' placeholder='Доп. Инфо' required>
                    </div>
                    <div class='form-group'>
                        <p>Ваша будущая должность: $myrowir[Naimen_Doljnost]</p>
                    </div>
                    <div class='form-group'>
                        <p>Ваш будущий отдел: $myrowir[Naimen_Otdel]</p>
                    </div>
                    <input type='text' name='doljnostneed' value='$myrowir[idDoljNeed]' style = 'display:none'>
                    <input type='text' name='idAuto' value='$myrow[idAuto]' style = 'display:none'>
                    <button class = 'btn-account' type = 'submit'>Отправить резюме</button>
                </form>";
        ?>
    </div>

</body>
</html>
