<?php

	session_start();

    

    if($_SERVER["REQUEST_METHOD"]=="POST"){
	if(isset($_POST['loginr'])){
		$dziala=true;

        $loginr=$_POST['loginr'];

        if((strlen($loginr)<4)||(strlen($loginr)>16)){
            $dziala=false;
            $_SESSION['e_login']='<span style="color:red"> Login musi posiadać od 4 do 16 znaków!</span>';
            header('Location:zarejestruj.php');
        }

        if(ctype_alnum($loginr)==false){
            $dziala=false;
            $_SESSION['e_login']='<span style="color:red"> Login może składać się tylko z liter i cyfr (bez polskich znaków)!</span>';
            header('Location:zarejestruj.php');
        }
        
        if(empty($_POST['loginr'])){
            $dziala=false;
            $_SESSION['e_login']='<span style="color:red"> Wpisz login!</span>';
            header('Location:zarejestruj.php');
        }
        
        $haslor1=$_POST['haslor1'];
        $haslor2=$_POST['haslor2'];

        if($haslor1 != htmlentities($haslor1, ENT_QUOTES, "UTF-8")){
            $dziala=false;
            $_SESSION['e_haslo']='<span style="color:red"> Hasło nie może posiadać znaków specjalnych!</span>';
            header('Location:zarejestruj.php');
        }

        if((strlen($haslor1)<8)||(strlen($haslor1)>20)){
            $dziala=false;
            $_SESSION['e_haslo']='<span style="color:red"> Hasło musi posiadać od 8 do 20 znaków!</span>';
            header('Location:zarejestruj.php');
        }

        if($haslor1!=$haslor2){
            $dziala=false;
            $_SESSION['e_haslo']='<span style="color:red"> Podane hasła nie są identyczne!</span>';
            header('Location:zarejestruj.php');
        }

        if(!isset($_POST['przycisk'])){
            $dziala=false;
            $_SESSION['e_przycisk']='<span style="color:red"> Zaakceptuj przetwarzanie danych osobowych!</span>';
            header('Location:zarejestruj.php');
        }
        
        $_SESSION['fr_login']=$loginr;
        $_SESSION['fr_haslo1']=$haslor1;
        $_SESSION['fr_haslo2']=$haslor2;

        require_once('baza.php');
        $polaczenie=mysqli_connect($ip,$user,$password,$base);
            if($polaczenie){
                $zapytanie="select * from konta where login='$loginr'";
                $wynik=mysqli_query($polaczenie,$zapytanie);
                if($wiersz=mysqli_fetch_array($wynik)){
                if($wiersz>0){
                    $dziala=false;
                    $_SESSION['e_login']='<span style="color:red"> Nazwa użytkownika już istnieje!</span>';
                    header('Location:zarejestruj.php');
                }
                }
                if($dziala==true){
                    $insert="insert into konta values(null,'$loginr','$haslor1')";
                    if(mysqli_query($polaczenie,$insert)){
                        $_SESSION['udanarejestracja']=true;
                        header('Location: witamy.php');
                    }
                    }
            }
        }
        mysqli_close($polaczenie);
    }
    
?>