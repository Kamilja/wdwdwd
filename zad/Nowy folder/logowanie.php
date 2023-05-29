<?php
require_once('baza.php');

$polaczenie=mysqli_connect($ip,$user,$password,$base);

    $login = mysqli_real_escape_string($polaczenie, $_POST['login']);
    $haslo = mysqli_real_escape_string($polaczenie, $_POST['haslo']);

$zapytanie = "SELECT * FROM users WHERE login="$login" AND haslo="$haslo"";
$wynik = mysqli_query($polaczenie, $zapytanie);

if (mysqli_num_rows($wynik) == 1) {
    $_SESSION['login'] = $login; 
    header('Location: restauracja.php'); 
        }else{
            $error = "Niepoprawna nazwa użytkownika lub hasło";
}

?>