<?php 
    session_start();

    
    if((!isset($_SESSION['udanarejestracja']))){
        header('Location:restauracja.html');
        exit();
    }else{
        unset($_SESSION['udanarejestracja']);
    }

    if(isset($_SESSION['fr_login'])) unset($_SESSION['fr_login']);
    if(isset($_SESSION['fr_haslo1'])) unset($_SESSION['fr_haslo1']);
    if(isset($_SESSION['fr_haslo2'])) unset($_SESSION['fr_haslo2']);

    if(isset($_SESSION['e_login'])) unset($_SESSION['e_login']);
    if(isset($_SESSION['e_haslo'])) unset($_SESSION['e_haslo']);
    if(isset($_SESSION['e_przycisk'])) unset($_SESSION['e_przycisk']);
    

?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styl_1.css">
    <title>Restauracja Wszystkie Smaki Logowanie</title>
</head>
<body>
<section class="banner">
        <h1>Witamy w restauracji „Wszystkie Smaki”<section class="menulogin"><a href="restauracja.html"><Button class="przycisk">WRÓĆ</Button></a></section></h1>
    </section>
    <section class="podbannerem">
        <h1>Dziekujemy za rejestracje prosze sie zalogować</h1>
    </section>
    <section class="formularz">
        <form method="post" action="logowanie.php">
            <label>Login:</label>
            <input type="text" name="login" id="login" placeholder="Wpisz login" minlength="4" maxlength="16"><br><br>
            <label>Hasło:</label>
            <input type="password" name="haslo" id="haslo" placeholder="Wpisz hasło" minlength="8" maxlength="20"><br><br>
            <button type="submit">ZALOGUJ</button>
          </form>
        <?php
            if(isset($_SESSION['blad'])){
            echo $_SESSION['blad'];  
            }
            
            if(isset($_SESSION['brakloginu'])){
            echo $_SESSION['brakloginu'];  
            }
            
            if(isset($_SESSION['brakhasla'])){
            echo $_SESSION['brakhasla'];  
            }
        ?>
    </section>
    <section class="footer">
        Stronę internetową opracował:<i>00000000000</i>
    </section>
</body>
</html>