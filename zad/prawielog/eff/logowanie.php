<?php
    session_start();

    if((!isset($_POST['login']))||(!isset($_POST['haslo']))){
        header('Location:zaloguj.php');
        exit();
    }
    
    require_once('baza.php');
    $polaczenie=mysqli_connect($ip,$user,$password,$base);
        if($_SERVER["REQUEST_METHOD"]=="POST"){
            if($polaczenie){
                if(empty($_POST['login'])){
                    $_SESSION['brakloginu']='<span style="color:red">Wpisz login!</span>';
                    header('Location:zaloguj.php');
                }else if (empty($_POST['haslo'])){
                    $_SESSION['brakhasla']='<span style="color:red">Wpisz hasło!</span>';
                    header('Location:zaloguj.php');
                }else{
                    $login=$_POST['login'];
                    $haslo=$_POST['haslo'];
                    
                    //encja
                    $login = htmlentities($login, ENT_QUOTES, "UTF-8");
		            $haslo = htmlentities($haslo, ENT_QUOTES, "UTF-8");
                    
                    $zapytanie="select * from konta where login='$login' and haslo='$haslo'";
                    $wynik=mysqli_query($polaczenie,$zapytanie);
                    if($wiersz=mysqli_fetch_array($wynik)){
                        $_SESSION['zalogowany']=true;
                        $_SESSION['id']=$wiersz['id'];
                        $_SESSION['user']=$wiersz['login'];

                        unset($_SESSION['blad']);
                        header('Location:zalogowany.php');
                    }else{
                        $_SESSION['blad']='<span style="color:red">Nieprawidłowy login lub hasło!</span>';
                        header('Location:zaloguj.php');
                    }
                }
            }
        }
    mysqli_close($polaczenie);
    
?>
    