<?php
include_once("../baza/upiti.php");
include("../baza/konekcija.php");
//session_start();


//////////////////dodati ako je setovana sesija
///////////////////////////////////////////REGULARNI IZRAZI//////////////////////////////////////////////////////
$regIme="/^[A-ZŠĐŽČĆ][a-zšđžčć]{2,15}(\s[A-Zšđžčć][a-zšđžčć])*$/";
$regPrezime="/^[A-ZŠĐŽČĆ][a-zšđžčć]{2,15}(\s[A-Zšđžčć][a-zšđžčć])?$/";
$regEmail="/^[a-zA-Z0-9\.\_]{4,}\@[a-z0-9]{3,}.([a-z]{2,3}){1,2}$/";
$regPas="/^([a-zA-Z0-9@*#\.\_]{8,})$/";

////////////////////////////////////////////DEKLARISANJE PROMENLJIVIH////////////////////////////////////////////

$greske=[];

///////////////////////////////////////////DOHVATANJE PODATAKA///////////////////////////////////////////////////
$id=$_POST['id'];
$idUloga=$_POST['idUloga'];
$ime=$_POST['ime'];
$prezime=$_POST['prezime'];
$email=$_POST['email'];
$grad=$_POST['grad'];

//////////////////////////////////////////////PROVERA PODATAKA//////////////////////////////////////////////////////
if(isset($ime) and !empty($ime)){
    if(!preg_match($regIme, $ime)){
        $greske[]="Ime nije u dobrom formatu";
    }
}
else {
    $greske[]="Morate uneti ime.";
}



if(isset($prezime) and !empty($prezime)){
    if(!preg_match($regPrezime, $prezime)){
        $greske[]="Prezime nije u dobrom formatu";
    }
}
else {
    $greske[]="Morate uneti prezime.";
}




if(isset($email) and !empty($email)){
    if(!preg_match($regEmail, $email)){
        $greske[]="Email nije u dobrom formatu";
    }
}
else {
    $greske[]="Morate uneti email.";
}


if(isset($grad)and $grad=="0"){
        
    $greske[]="Morate izabrati grad.";
}

if(!isset($idUloga) or empty($idUloga)){
    $idUloga=16;
}



if(count($greske)>0){
    //$_SESSION['greske']=$greske;
        $code=422;
        $podaci=$greske;
    }


else{

    ////////////////////UPDATE PODATAKA U BAZI//////////////////////
    include_once("../baza/konekcija.php");
    if($konekcija){
        //$code=200;
        $upit=$konekcija->prepare($upitUpdateKorisnik);
        $upit->bindParam(":ime", $ime);
        $upit->bindParam(":prezime", $prezime);
        $upit->bindParam(":email",$email);
        $upit->bindParam(":grad",$grad);
        $upit->bindParam(":uloga",$idUloga);
        $upit->bindParam(":id",$id);
        $rezultat=$upit->execute();
        if($rezultat){
            //$code=201;
            include("../baza/podaciKorisnik.php");
            $upitPodaci=$konekcija->prepare($upitPodacikorisnik);
            $upitPodaci->bindParam(":id",$id);
            $upitPodaci->execute();
            $rez=$upitPodaci->fetchAll();
            if(count($rez)>0){
                $code=202;
                $_SESSION['korisnik']=$rez;
                $podaci=$rez;
            }
            else{
                $code=401;
                $podaci=array('message'=>'Podaci nisu izmenjeni.');

            }
            }
        else{
                //$_SESSION['greske']=$greske;
                $code=304;
                $podaci=array('message'=>'Podaci nisu izmenjeni.');
            }            
    }
    
    // $code=304;
    // $podaci=array('message'=>'Greska u konekciji sa bazom.');

}
http_response_code($code);
echo json_encode($podaci);
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////




?>