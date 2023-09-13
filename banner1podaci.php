<?php
include_once("baza/konekcija.php");
include_once("baza/upiti.php");

if($konekcija){
    $id=2;
    $ispis="";
     $upit=$konekcija->prepare($podaciIndex);
     $upit->bindParam(":id",$id);
     $upit->execute();
     $rezultat=$upit->fetchAll();
     if($rezultat){
         for($i=0; $i<count($rezultat);$i++){
             if($i%2){
                if(!$rezultat[$i]->markersignup){
                $ispis.="<div class='block1 hov-img-zoom pos-relative m-b-30'>";
                $ispis.="<img src='.".$rezultat[$i]->putanja."' alt='".$rezultat[$i]->tekst."'>";
                $ispis.="<div class='block1-wrapbtn w-size2'>";
                $ispis.="<a href='".$rezultat[$i]->link."' class='bannerButton flex-c-m size2 m-text2 bg3 hov1 trans-0-4'>";
                $ispis.=$rezultat[$i]->naslov1."</a></div></div></div>";
                
             }
             else{
                 $ispis.="<div class='block2 wrap-pic-w pos-relative m-b-30'>";
                 $ispis.="<img src='.".$rezultat[$i]->putanja."' alt='".$rezultat[$i]->tekst."'>";
                 $ispis.="<div class='block2-content sizefull ab-t-l flex-col-c-m'>";
                 $ispis.="<div class='w-size2 p-t-25'>";
                 $ispis.="<a href='".$rezultat[$i]->link."' class='bannerButton flex-c-m size2 bg4 bo-rad-23 hov1 m-text3 trans-0-4'>";
                 $ispis.=$rezultat[$i]->naslov1."</a></div>";
                 $ispis.="<h4 class='m-text4 t-center w-size3 p-b-8'>";
                $ispis.=$rezultat[$i]->tekst."</h4></div></div></div></div>";
             }
            }
            else{
                $ispis.="<div class='col-sm-10 col-md-8 col-lg-4 m-l-r-auto'>";
                $ispis.="<div class='block1 hov-img-zoom pos-relative m-b-30'>";
                $ispis.="<img src='.".$rezultat[$i]->putanja."' alt='".$rezultat[$i]->tekst."'>";
                $ispis.="<div class='block1-wrapbtn w-size2'>";
                $ispis.="<a href='".$rezultat[$i]->link."' class='bannerButton flex-c-m size2 m-text2 bg3 hov1 trans-0-4'>";
                $ispis.=$rezultat[$i]->naslov1."</a></div></div>";
            }
         }
            
             
             
             
             

         }
    
     
     echo $ispis;

     
 }
?>

							
								