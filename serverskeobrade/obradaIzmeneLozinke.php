<?php
include_once("../baza/konekcija.php");
include_once("../baza/upiti.php");
///////////////////////////////////DOHVATANJE PODATAKA/////////////////////////////////
$id=$_POST['id'];
$pas=$_POST['pas'];
$greske=[];
$podaci=null;

///////////////////////////////REGULARNI IZRAZI//////////////////////////////////////
$regPas="/^([a-zA-Z0-9@*#\.\_]{8,})$/";
////////////////////////////////PROVERA PODATAKA////////////////////////////////////
if(!isset($pas) and empty($pas)){
    $greske[]="Morate uneti lozinku.";
}
else if(!preg_match($regPas, $pas)){
    $greske[]="Loznika nije u dobrom formatu.";}

if(count($greske)>0){
    $podaci=$greske[0];
    $code=422;
}

else{
    if($konekcija){
        $code=200;
        $pas=md5($pas);
        $upit=$konekcija->prepare($upitUpdateLozinke);
        $upit->bindParam(":pas",$pas);
        $upit->bindParam(":id",$id);
        $rez= $upit->execute();

        if($rez){
            $code=201;
            include("podaciKorisnik.php");
            $upit=$konekcija->prepare($upitPodacikorisnik);
            $upit->bindParam(":id",$id);
            $upit->execute();
            $rez=$upit->fetchAll();
            if(count($rez)>0){
                $code=202;
                $_SESSION['korisnik']=$rez;
                var_dump($SESSION['korisnik'][0]->password);
                $podaci=$rez;
            }
        }
        else{
            $code=304;
            $podaci=array('message'=>'Podaci nisu promenjeni');
        }

    
    }
    else{
        $code=500;
        $podaci=array('message'=>'Greska sa konekcijom sa bazom');
    }
}

http_response_code($code);
echo json_encode($podaci);





?>