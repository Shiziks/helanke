<?php
include_once("../baza/konekcija.php");
include_once("../baza/upiti.php");
if($konekcija){
    $upitbroj=$konekcija->prepare($brojproizvoda);
    $upitbroj->execute();
    $broj=$upitbroj->fetch();
    if($broj){
        //var_dump($broj);
        $brojredova=$broj->broj;
        //var_dump($brojredova);
        $brojstrana=ceil($brojredova/6);
        //echo $brojstrana;
    }
    $ispis="<div class='pagination flex-m flex-w p-t-26'>";
    for($i=1; $i<=$brojstrana; $i++){
        $ispis.="<a href='prodavnica.php?broj=".$i."' class='item-pagination flex-c-m trans-0-4 active-pagination'>".$i."</a>";
    }
    $ispis.="</div>";
    
    echo$ispis;
}



?>


