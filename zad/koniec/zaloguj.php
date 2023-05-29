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
    <title>Restauracja Wszystkie Smaki Logowanie</title>
</head>
<body>
<div class="banner">
        <h1><a href="restauracja.html"><Button class="przycisk">WRÓĆ</Button></a> Witamy w restauracji „Wszystkie Smaki”</h1>
    </div>
    <div class="podbannerem">
        <h1>Prosze sie zalogować</h1>
    </div>
    <div class="formularz">
        <form method="post" action="logowanie.php">
            <label>Login:</label>
            <input type="text" name="login" id="login" placeholder="Wpisz login"><br><br>
            <label>Hasło:</label>
            <input type="password" name="haslo" id="haslo" placeholder="Wpisz hasło"><br><br>
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
    </div>
    <div class="footer">
        Stronę internetową opracował:<i>00000000000</i>
    </div>
</body>
</html>