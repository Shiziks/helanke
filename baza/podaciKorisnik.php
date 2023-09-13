<?php
include("../baza/upiti.php");
    if(isset($_SESSION['korisnik'])){
       // echo "Radi";
       //include_once("konekcija.php");
     //var_dump($_SESSION["korisnik"]);
        
     $id=$_SESSION['korisnik'][0]->idkorisnika;
     //echo $id;
     
     if($konekcija){
         
         $upit=$konekcija->prepare($upitPodacikorisnik);
         $upit->bindParam(":id",$id);
         $upit->execute();
         $rezultat=$upit->fetch();
 
         //var_dump($rezultat); 
         //rezultat je objekat- red iz baze
         $idUloga=$rezultat->iduloga;
         $ime=$rezultat->ime;
         //echo $ime;
         $prezime=$rezultat->prezime;
         $email=$rezultat->email;
         $grad=$rezultat->nazivgrada;
         $pas=$rezultat->password;
         $id=$rezultat->idkorisnika;
         //var_dump($pas);
         //echo $grad;

        }

   
        
    }
    

    



?>