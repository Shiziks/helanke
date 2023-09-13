<?php include("../baza/konekcija.php");
include("../baza/upiti.php");

$upit=$konekcija->prepare($upitglavnimeni);
$upit->execute();
$glavnimeni=$upit->fetchAll();

$upitpodmeni=$konekcija->prepare($upitpodmeni);
$upitpodmeni->execute();
$podmeni=$upitpodmeni->fetchAll();

if($glavnimeni){
    $ispis="<div class='wrap_menu'><nav class='menu'><ul class='main_menu'>";
    foreach($glavnimeni as $meni){
        $ispis.="<li><a href='../".$meni->link."'>".$meni->stavka."</a>";
        if($meni->podmeni){
            $ispis.="<ul class='sub_menu'>";
            //echo $meni->podmeni."<br>";
            foreach($podmeni as $pod){
                //echo $pod->stavka."<br>";
                $ispis.="<li><a href='../".$pod->link."'>".$pod->stavka."</a></li>";
            }
            $ispis.="</ul>";
        }
        $ispis.="</li>";
        
    }
    $ispis.="</ul>";
    echo $ispis;
}
else echo "Došlo je do greške";



?>
