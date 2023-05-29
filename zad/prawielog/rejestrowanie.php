<?php 

    session_start();

    if((!isset($_POST['loginr']))||(!isset($_POST['haslor1']))||(!isset($_POST['haslor2']))){
        header('Location:zarejestruj.php');
        exit();
    }

    require_once('baza.php');
    $polaczenie=mysqli_connect($ip,$user,$password,$base);
        if($_SERVER["REQUEST_METHOD"]=="POST"){
            if($polaczenie){
                if(empty($_POST['loginr'])){
                    $_SESSION['brakloginur']='<span style="color:red"> Wpisz login!</span>';
                    header('Location:zarejestruj.php');
                }else if(empty($_POST['haslor1'])){
                    $_SESSION['brakhasla1']='<span style="color:red"> Wpisz hasło!</span>';
                    header('Location:zarejestruj.php');
                }else if(empty($_POST['haslor2'])){
                    $_SESSION['brakhasla2']='<span style="color:red"> Powtórz hasło!</span>';
                    header('Location:zarejestruj.php');
                }else if(empty($_POST['przycisk'])){
                    $_SESSION['brakakceptacji']='<span style="color:red"> Zaakceptuj przetwarzanie danych osobowych!</span>';
                    header('Location:zarejestruj.php');
                }else{
                    $loginr=$_POST['loginr'];
                    $haslor1=$_POST['haslor1'];
                    $haslor2=$_POST['haslor2'];

                    if(ctype_alnum($loginr)==false){
                        $_SESSION['blad']='<span style="color:red">Login może składać się tylko z liter i cyfr (bez polskich znaków)!</span>';
                        header('Location:zarejestruj.php');
                    }
                    
                    //encja
                    $haslor1 = htmlentities($haslor1, ENT_QUOTES, "UTF-8");
                    $haslor2 = htmlentities($haslor2, ENT_QUOTES, "UTF-8");
                    
                    $zapytanie="select login from konta where login='$loginr'";
                    if($zapytanie==true){

                    }
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