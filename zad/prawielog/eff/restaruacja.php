<?php
    require_once('baza.php');
    $polaczenie=mysqli_connect($ip,$user,$password,$base);
            if($_SERVER["REQUEST_METHOD"]=="POST"){
                if($polaczenie){
                    if(empty($_POST['przycisk'])){
                        echo "Wypełnij wszystkie dane";
                    }else{
                        $data_rez=$_POST["data"];
                        $liczba_osob=$_POST["osoby"];
                        $telefon=$_POST["telefon"];
                        $zapytanie="insert into rezerwacje values(null,' ','$data_rez','$liczba_osob','$telefon')";
                        if(mysqli_query($polaczenie,$zapytanie)){
                            echo "Dodano do bazy";
                        }
                        else{
                            echo "Błąd";
                        }
                }
            }
        }
            mysqli_close($polaczenie);
            
    ?>