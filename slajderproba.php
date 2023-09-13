<?php
include_once("baza/konekcija.php");
include_once("baza/upiti.php");
if($konekcija){
   $ispis="";
    $upit=$konekcija->prepare($slikeSlajder);
    $upit->execute();
    $rezultat=$upit->fetchAll();
    if($rezultat>0){
        foreach($rezultat as $rez){
            $ispis.="<div class='item-slick1 item1-slick1' style='background-image: url(";
            $naslov1=$rez->naslov1;
            $naslov2=$rez->naslov2;
            $tekst=$rez->tekst;
            $putanja=$rez->putanja;
            $ispis.=$putanja;
            $ispis.=");'><div class='wrap-content-slide1 sizefull flex-col-c-m p-l-15 p-r-15 p-t-150 p-b-170'>
                <span class='caption1-slide1 m-text1 t-center animated visible-false m-b-15' data-appear='fadeInDown'>";
            $ispis.=$naslov1;
            $ispis.="<h2 class='caption2-slide1 xl-text1 t-center animated visible-false m-b-37' data-appear='fadeInUp'>";
            $ispis.=$naslov2;
            $ispis.="</h2><div class='wrap-btn-slide1 w-size1 animated visible-false' data-appear='zoomIn'>
            <a href='product.html' class='flex-c-m size2 bo-rad-23 s-text2 bgwhite hov1 trans-0-4>";
            $ispis.=$tekst;
            $ispis.="</a></div></div></div>";

        }
        echo $ispis;
    }
}


?>