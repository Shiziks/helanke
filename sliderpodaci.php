<?php
include_once("baza/konekcija.php");
include_once("baza/upiti.php");


if($konekcija){
   $id=1;
    $upit=$konekcija->prepare($podaciIndex);
    $upit->bindParam(":id",$id);
    $upit->execute();
    $rezultat=$upit->fetchAll();
    
    //echo $putanja;
    
    
}



?>
