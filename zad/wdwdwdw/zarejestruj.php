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
<div class="banner">
        <h1>Witamy w restauracji „Wszystkie Smaki”<div class="menulogin"><a href="restauracja.html"><Button class="przycisk">WRÓĆ</Button></a></div></h1>
    </div>
    <div class="podbannerem">
        <h1>Prosze sie zarejestrowac</h1>
    </div>
    <div class="formularz">
        <form method="post" action="logowanie.php">
            <div class="lewyreg">
                <label>Login:</label><br><br>
                <label>Hasło:</label><br><br>
                <label>Powtórz hasło:</label><br><br>
            </div class="prawyreg">
            <div>
                <input type="text" name="loginr" id="loginr" placeholder="Wpisz login" minlength="4" maxlength="16"><br><br>
                <input type="password" name="haslor1" id="haslor1" placeholder="Wpisz hasło" minlength="8" maxlength="20"><br><br>
                <input type="password" name="haslor2" id="haslor2" placeholder="Powtórz hasło" minlength="8" maxlength="20"><br><br>
            </div>
            
            
            
            
            
            
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