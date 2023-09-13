<?php 
include("../baza/konekcija.php");


if($konekcija){
    //$code=200;
    //$tabela="korisnici";
    include("../baza/upiti.php");

    $pripremaprovere=$konekcija->prepare($korisnikPostoji);
    $pripremaprovere->bindParam(':email',$email);

    try{
        $postoji=$pripremaprovere->fetch();
        if($postoji){
            $code=409;
            $podaci=array('message'=>'Za ovaj email je već kreiran nalog.');
        }
        else{
            $pripremaupita=$konekcija->prepare($upisKorisnikaUpit);
            $pripremaupita->bindParam(':ime',$ime);
            $pripremaupita->bindParam(':prezime',$prezime);
            $pripremaupita->bindParam(':email',$email);
            $pripremaupita->bindParam(':password',$pas);
            $pripremaupita->bindParam(':idGrad',$ddl);
            $pripremaupita->bindParam(':idUloge',$idUloge);
        
            try{
                $rezultat=$pripremaupita->execute();
                if($rezultat){
                    //echo"Korisnik je upisan u bazu.";
                    $code=201;
                    $podaci=array('message'=>'Uspesna registracija.');
                }
                else{
                    $code=500;
                }
            }
            catch(PDOException $e){
                echo $e->getMessage();
                $code=409;
        
            }
        }
    }
    catch(PDOException $e){
        echo $e->getMessage();
        $code=409;
    }
    $konekcija=NULL;
    
    



}
else {$code=404;}






?>