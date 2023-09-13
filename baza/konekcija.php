<?php
    $user="root";
    $pass="";
    $server="localhost";
    $baza="helanke";

    try{
            

            $konekcija=new PDO("mysql:host=$server;dbname=$baza;charset=utf8",$user,$pass);
            $konekcija->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            $konekcija->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_OBJ);
            //echo "Konekcija uspela";
        }
    catch(PDOException $e){
        echo "Greska pri konekciji: ".$e->getMessage();
    }


?>