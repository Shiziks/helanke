
<?php

include_once("../baza/konekcija.php");
include_once("../baza/upiti.php");
if($konekcija){
    if(isset($_POST['boja'])){
    $boja=$_POST['boja'];
    $koliko=6;
        if(isset($_GET['broj'])){
            $broj=$_GET['broj'];
            if($broj==1){
                $kreni=$broj-1;
            }
            else $kreni=($broj-1)*$koliko;
        }
        else $kreni=0;
    
    $ispis="<div class='row'>";
    $upit=$konekcija->prepare($upitproizvodiboja);
    $upit->bindParam(":boja",$boja,PDO::PARAM_STR);
    $upit->bindParam(":kreni",$kreni,PDO::PARAM_INT);
    $upit->bindParam(":koliko",$koliko,PDO::PARAM_INT);
    $upit->execute();
    $rezultat=$upit->fetchAll();

    if($rezultat){
        $broj=count($rezultat);
        $brojstrana=ceil($broj/6);

        $strane="<div class='pagination flex-m flex-w p-t-26'>";
            for($i=1; $i<=$brojstrana; $i++){
                $strane.="<a href='prodavnica.php?broj=".$i."' class='item-pagination flex-c-m trans-0-4 active-pagination'>".$i."</a>";
            }
        $strane.="</div>";
    
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
            $ispis.="<img src='..".$rez->putanja."' alt='".$rez->alt."'>";
            $ispis.="<div class='block2-overlay trans-0-4'>";
            $ispis.="<a href='../proizvod/proizvod.php?id=".$rez->idproizvod."' class='block2-btn-addwishlist hov-pointer trans-0-4'>";
            $ispis.="<i class='icon-wishlist icon_heart_alt' aria-hidden='true'></i>";
            $ispis.="<i class='icon-wishlist icon_heart dis-none' aria-hidden='true'></i></a>";
            $ispis.="<div class='block2-btn-addcart w-size1 trans-0-4' id='".$rez->idproizvod."' data-putanja='".$rez->putanja."' data-cena='".$novacena."' data-naziv='".$rez->nazivproizvoda."'>";
            $ispis.="<button class='flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4'>DODAJ U KORPU</button>";
            $ispis.="</div></div></div><div class='block2-txt p-t-20'>";
            $ispis.="<a href='../proizvod/proizvod.php?id=".$rez->idproizvod."' class='block2-name dis-block s-text3 p-b-5'>".$rez->nazivproizvoda."</a>";
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
            $ispis.="<span class='block2-oldprice m-text7 p-r-5'>".$staracena." rsd</span>";
            $ispis.="<span class='block2-newprice m-text8 p-r-5'>".$novacena." rsd</span>";
            $ispis.="</div></div></div>";
            }
            else if($rez->novakolekcija){
            $ispis.="<div class='col-sm-12 col-md-6 col-lg-4 p-b-50'><div class='block2'><div class='block2-img wrap-pic-w of-hidden pos-relative block2-labelnew'>";
            $ispis.="<img src='..".$rez->putanja."' alt='".$rez->alt."'>";
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
            $ispis.="<img src='..".$rez->putanja."' alt='".$rez->alt."'>";
            $ispis.="<div class='block2-overlay trans-0-4'>";
            $ispis.="<a href='../proizvod/proizvod.php?id=".$rez->idproizvod."' class='block2-btn-addwishlist hov-pointer trans-0-4'>";
            $ispis.="<i class='icon-wishlist icon_heart_alt' aria-hidden='true'></i>";
            $ispis.="<i class='icon-wishlist icon_heart dis-none' aria-hidden='true'></i></a>";
            $ispis.="<div class='block2-btn-addcart w-size1 trans-0-4' id='".$rez->idproizvod."' data-putanja='".$rez->putanja."' data-cena='".$rez->cena."' data-naziv='".$rez->nazivproizvoda."'>";
            $ispis.="<button class='flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4'>DODAJ U KORPU</button>";
            $ispis.="</div></div></div><div class='block2-txt p-t-20'>";
            $ispis.="<a href='product-detail.html' class='block2-name dis-block s-text3 p-b-5'>".$rez->nazivproizvoda."</a>";
            $ispis.="<span class='block2-price m-text6 p-r-5'>".$rez->cena." rsd</span></div></div></div>";
            }
        }

        $ispis.="</div>";
        $ispis.=$strane;
        echo $ispis;

    }
    else echo "Došlo je do greške";
    
}
}
?>
