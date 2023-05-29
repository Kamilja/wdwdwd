<?php 
    session_start();

    if(!isset($_SESSION['zalogowany'])){
        header('Location:zaloguj.php');
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
    <title>Restauracja Wszystkie Smaki</title>
</head>
<body>
    <div class="banner">
        <h1>Witamy <?php echo $_SESSION['user']; ?> w restauracji „Wszystkie Smaki” <div class="menulogin"><?php echo '<a href="wyloguj.php"><Button class="przycisk">WYLOGUJ</Button></a>'; ?></div></h1>
    </div>
    <div class="pusty">

    </div>
    <div class="lewy">
        <img src="menu.jpg" width="500" height="350 px" alt="Nasze danie">
    </div>
    <div class="prawy">
        <h4>U nas dobrze zjesz!</h4>
        <ol>
            <li>Obiady od 40 zł</li>
            <li>Przekąski od 10 zł</li>
            <li>Kolacje od 20 zł</li>
        </ol>
    </div>
    <div class="dolny">
        <h2>Zarezerwuj stolik on-line</h2>
        <form method="post" action="restaruacja.php">
            Data (format rrrr-mm-dd):<br>
            <input type="text" name="data"><br>
            Ile osób?<br>
            <input type="=number" name="osoby"><br>
            Twój numer telefonu:<br>
            <input type="text" name="telefon"><br>
            <label for="przycisk"></label>
            <input type="checkbox" name="przycisk">
            Zgadzam się na przetwarzanie moich danych osobowych<br>
            <button type="reset">WYCZYŚĆ</button>
            <button type="submit">REZERWUJ</button>
        </form>
    </div>
    <div class="footer">
        Stronę internetową opracował:<i>00000000000</i>
    </div>
    
</body>
</html>