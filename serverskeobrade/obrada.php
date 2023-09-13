<?php
//echo "bla";

    $greske=[];
    $podaci=NULL;
    
    //echo"Radi";
///////////////////////////////HVATANJE PODATAKA//////////////////////////
    $ime=$_POST['ime'];
   //echo $ime."<br/>";
    $prezime=$_POST['prezime'];
   // echo$prezime."<br/>";
    $email=$_POST['email'];
   // echo $email."<br/>";
    $pas=$_POST['password'];
    $pas1=$_POST['password1'];
   // echo $pas."<br/>";
    //echo $pas1."<br/>";
    $ddl=$_POST['grad'];
    $idUloge="16";

    
    
    //var_dump($ddl);

/////////////////////////////////REGULARNI IZRAZI///////////////////////////

$regIme="/^[A-ZŠĐŽČĆ][a-zšđžčć]{2,15}(\s[A-Zšđžčć][a-zšđžčć])*$/";
$regPrezime="/^[A-ZŠĐŽČĆ][a-zšđžčć]{2,15}(\s[A-Zšđžčć][a-zšđžčć])?$/";
$regEmail="/^[a-zA-Z0-9\.\_]{4,}\@[a-z0-9]{3,}.([a-z]{2,3}){1,2}$/";
$regPas="/^([a-zA-Z0-9@*#\.\_]{8,})$/";

/////////////////////////////Provera podataka/////////////////////////////

    if(isset($ime) and !empty($ime)){
        
        if(!preg_match($regIme, $ime)){
            $greske[]="Ime nije u dobrom formatu.";
        }
    }
    else $greske[]="Ime nije uneto.";

    if(isset($prezime) and !empty($prezime)){
        
        if(!preg_match($regPrezime, $prezime)){
            $greske[]="Prezime nije u dobrom formatu.";
        }
    }
    else $greske[]="Prezime nije uneto.";

    if(isset($email) and !empty($email)){
        
        if(!preg_match($regEmail, $email)){
            $greske[]="Email nije u dobrom formatu.";
        }
    }
    else $greske[]="Email adresa nije uneta.";

    if(isset($pas) and !empty($pas)){
        
        if(!preg_match($regPas, $pas)){
            $greske[]="Lozinka nije u dobrom formatu.";
        }
    }
    else $greske[]="Lozinka nije uneta.";

    if(isset($pas1)and !empty($pas1)){
        
        if($pas!=$pas1){
            $greske[]="Lozinke moraju biti iste.";
        }
    }
    else $greske[]="Morate ponovo uneti lozniku.";

    
    if(isset($ddl)and $ddl=="0"){
        
        $greske[]="Morate izabrati grad.";
    }
    
   
    


    if(count($greske)>0){
        $code=422;
        $podaci=$greske;
    }

    else{
        ///////////////ucitavanje fajla sa upitima i konekcije///////////////////////////////////////
        //echo "radi";
        $pas=md5($pas);
        include('../baza/upisKorisnika.php');
        //$podaci="";
        //$code=201;
        
        
    }

    http_response_code($code);
    echo json_encode($podaci);







?>