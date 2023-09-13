<?php
include_once("../baza/konekcija.php");
include_once("../baza/upiti.php");
if($konekcija){
    if(isset($_GET['idk'])){
        $idk=$_GET['idk'];
        $ispis="";
        $upit=$konekcija->prepare($upitKategorija);
        $upit->bindParam(":idk",$idk);
        $upit->execute();
        $rezultat=$upit->fetchAll();
        if($rezultat){
            if($rezultat){
            foreach($rezultat as $rez){
                if($rez->popust){
                    $staracena=$rez->cena;
                    if($rez->popust50){
                        
                        $novacena=ceil($staracena*0.5);
                    }
                    else if($rez->popust10){
                        $novacena=ceil($staracena*0.9);
                    }
                    else if($rez->popust25){
                        $novacena=ceil($staracena*0.75);
                    }
                $ispis.="<div class='col-sm-12 col-md-6 col-lg-4 p-b-50'><div class='block2'><div class='block2-img wrap-pic-w of-hidden pos-relative block2-labelsale'>";
                $ispis.="<img src='../".$rez->putanja."' alt='".$rez->alt."'>";
                $ispis.="<div class='block2-overlay trans-0-4'>";
                $ispis.="<a href='../proizvod/proizvod.php?id=".$rez->idproizvod."' class='block2-btn-addwishlist hov-pointer trans-0-4'>";
                $ispis.="<i class='icon-wishlist icon_heart_alt' aria-hidden='true'></i>";
                $ispis.="<i class='icon-wishlist icon_heart dis-none' aria-hidden='true'></i></a>";
                $ispis.="<div class='block2-btn-addcart w-size1 trans-0-4' id='".$rez->idproizvod."' data-putanja='".$rez->putanja."' data-cena='".$novacena."' data-naziv='".$rez->nazivproizvoda."'>";
                $ispis.="<button class='flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4'>DODAJ U KORPU</button>";
                $ispis.="</div></div></div><div class='block2-txt p-t-20'>";
                $ispis.="<a href='../proizvod/proizvod.php?id=".$rez->idproizvod."' class='block2-name dis-block s-text3 p-b-5'>".$rez->nazivproizvoda."</a>";
                $ispis.="<span class='block2-oldprice m-text7 p-r-5'>".$staracena." rsd</span>";
                $ispis.="<span class='block2-newprice m-text8 p-r-5'>".$novacena." rsd</span>";
                $ispis.="</div></div></div>";
                }
                else if($rez->novakolekcija){
                $ispis.="<div class='col-sm-12 col-md-6 col-lg-4 p-b-50'><div class='block2'><div class='block2-img wrap-pic-w of-hidden pos-relative block2-labelnew'>";
                $ispis.="<img src='../".$rez->putanja."' alt='".$rez->alt."'>";
                $ispis.="<div class='block2-overlay trans-0-4'>";
                $ispis.="<a href='../proizvod/proizvod.php?id=".$rez->idproizvod."' class='block2-btn-addwishlist hov-pointer trans-0-4'>";
                $ispis.="<i class='icon-wishlist icon_heart_alt' aria-hidden='true'></i>";
                $ispis.="<i class='icon-wishlist icon_heart dis-none' aria-hidden='true'></i></a>";
                $ispis.="<div class='block2-btn-addcart w-size1 trans-0-4' id='".$rez->idproizvod."' data-putanja='".$rez->putanja."' data-cena='".$rez->cena."' data-naziv='".$rez->nazivproizvoda."'>";
                $ispis.="<button class='flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4'>DODAJ U KORPU</button>";
                $ispis.="</div></div></div><div class='block2-txt p-t-20'>";
                $ispis.="<a href='../proizvod/proizvod.php?id=".$rez->idproizvod."' class='block2-name dis-block s-text3 p-b-5'>".$rez->nazivproizvoda."</a>";
                $ispis.="<span class='block2-price m-text6 p-r-5'>".$rez->cena." rsd</span></div></div></div>";
    
                }
                else{
                $ispis.="<div class='col-sm-12 col-md-6 col-lg-4 p-b-50'><div class='block2'><div class='block2-img wrap-pic-w of-hidden pos-relative'>";
                $ispis.="<img src='../".$rez->putanja."' alt='".$rez->alt."'>";
                $ispis.="<div class='block2-overlay trans-0-4'>";
                $ispis.="<a href='../proizvod/proizvod.php?id=".$rez->idproizvod."' class='block2-btn-addwishlist hov-pointer trans-0-4'>";
                $ispis.="<i class='icon-wishlist icon_heart_alt' aria-hidden='true'></i>";
                $ispis.="<i class='icon-wishlist icon_heart dis-none' aria-hidden='true'></i></a>";
                $ispis.="<div class='block2-btn-addcart w-size1 trans-0-4' id='".$rez->idproizvod."' data-putanja='".$rez->putanja."' data-cena='".$rez->cena."' data-naziv='".$rez->nazivproizvoda."'>";
                $ispis.="<button class='flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4'>DODAJ U KORPU</button>";
                $ispis.="</div></div></div><div class='block2-txt p-t-20'>";
                $ispis.="<a href='../proizvod/proizvod.php?id=".$rez->idproizvod."' class='block2-name dis-block s-text3 p-b-5'>".$rez->nazivproizvoda."</a>";
                $ispis.="<span class='block2-price m-text6 p-r-5'>".$rez->cena." rsd</span></div></div></div>";
                }
            }
    
            echo $ispis;
            }
            else echo "Došlo je do greške";
        }
    }
    else {include("proizvodi.php");
        include("brojstrana.php");}
}
?>
    