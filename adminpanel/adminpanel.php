<?php

session_start();

if(!isset($_SESSION['korisnik']) || $_SESSION['korisnik'][0]->idUloga!=16){ ///////// promeniti kasnije na 15
  header("Location:logovanje.php");
}
else{
    include_once("heder.php");
    include_once("menu.php");
    include_once("footer.php");
    
    
}
//var_dump($_SESSION);
?>