<?php 
    session_start();

    if((isset($_SESSION['zalogowany']))&&($_SESSION['zalogowany']==true)){
        header('Location:zalogowany.php');
        exit();
    }
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styl_1.css">
    <title>Restauracja Wszystkie Smaki Rejestracja</title>
</head>
<body>
<section class="banner">
        <h1>Witamy w restauracji „Wszystkie Smaki”<section class="menulogin"><a href="restauracja.html"><Button class="przycisk">WRÓĆ</Button></a></section></h1>
    </section>
    <section class="podbannerem">
        <h1>Prosze sie zarejestrowac</h1>
    </section>
    <section class="formularz">
        <form method="post" action="rejestracja.php">
            <section class="lewyreg">
                <label>Login:</label><br><br>
                <label>Hasło:</label><br><br>
                <label>Powtórz hasło:</label><br><br>
            </section>
            <section class="prawyreg">
                <input type="text" name="loginr" id="loginr" value="<?php if(isset($_SESSION['fr_login'])){
                    echo $_SESSION['fr_login'];
                    unset($_SESSION['fr_login']);
                } ?>" placeholder="Wpisz login"><?php
                    if(isset($_SESSION['e_login'])){
                        echo $_SESSION['e_login'];  
                        unset($_SESSION['e_login']);
                        } ?><br><br>
                <input type="password" name="haslor1" id="haslor1" value="<?php if(isset($_SESSION['fr_haslo1'])){
                    echo $_SESSION['fr_haslo1'];
                    unset($_SESSION['fr_haslo1']);
                } ?>" placeholder="Wpisz hasło"><?php
                    if(isset($_SESSION['e_haslo'])){
                        echo $_SESSION['e_haslo'];
                        unset($_SESSION['e_haslo']);
                        } ?><br><br>
                <input type="password" name="haslor2" id="haslor2" value="<?php if(isset($_SESSION['fr_haslo2'])){
                    echo $_SESSION['fr_haslo2'];
                    unset($_SESSION['fr_haslo2']);
                } ?>" placeholder="Powtórz hasło"><br><br>
            </section>
                <input type="checkbox" name="przycisk">
                Zgadzam się na przetwarzanie moich danych osobowych <br><?php
                    if(isset($_SESSION['e_przycisk'])){
                        echo $_SESSION['e_przycisk'];  
                        unset($_SESSION['e_przycisk']);
                        } ?><br>
                <button type="submit">ZAREJESTRUJ</button>
          </form>
    </section>
    <section class="footer">
        Stronę internetową opracował:<i>00000000000</i>
    </section>
</body>
</html>