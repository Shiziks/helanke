<?php
//potrebno poremniti header location adrese sa adresama sa servera
//echo"alert('radi');";
session_start();
include("../baza/konekcija.php");
include("../baza/upiti.php");
if(isset($_POST['login'])){
    
    /////////////////////////////////REGULARNI IZRAZI/////////////////////////////////
    $regEmail="/^[a-zA-Z0-9\.\_]{4,}\@[a-z0-9]{3,}.([a-z]{2,3}){1,2}$/";
    $regPas="/^([a-zA-Z0-9@*#\.\_]{8,})$/";
    

    /////////////////////////////HVATANJE PODATAKA///////////////////////////////////
    $greske=[];
    $email=$_POST['emailLog'];
    $pas=$_POST['passLog'];
    $cartString=$_POST['cart'];
    if(isset($cartString) and !empty($cartString)){
        $cart=json_decode($cartString);
        /////UPISI U BAZU CART
    }
    //var_dump($cart);
    //var_dump($mejl);
    //var_dump($pas);

    ///////////////////////////PROVERA PODATAKA/////////////////////////////////////
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

        //var_dump($greske);

        if(count($greske)>0){
           $_SESSION['greske']=$greske;
           //var_dump($greske);
            header("Location:logovanje.php"); //premoni u putanju sa servera
        }
        else{
           
            if($konekcija){
                //var_dump($konekcija);
                $pas=md5($pas);
                //var_dump($pas);
                $upit=$konekcija->prepare($upitLog);
                $upit->bindParam(':email',$email);
                $upit->bindParam(':pas',$pas);


                try{
                    $upit->execute();
                    $rez=$upit->fetchAll();
                    //var_dump($rez);
                    if(count($rez)>0){
                        try{
                            $konekcija->beginTransaction();
                            $upit1=$konekcija->prepare($upitNovaKorpa);
                            $upit1->execute();
                        //radi
                            $korpaId=$konekcija->lastInsertId();
                            $upit2=$konekcija->prepare($upitKorpaPodaci);;
                        foreach($cart as $one){
                            $idkorisnika=$rez[0]->idkorisnika;
                            $idproizvod=$one->id;
                            $kolicina=1;
                            $upit2->bindParam(':idkorpa', $korpaId);
                            $upit2->bindParam(':idkorisnika', $idkorisnika);
                            $upit2->bindParam(':idproizvod', $idproizvod );
                            $upit2->bindParam(':kolicina', $kolicina);
                            $upit2->execute();
                        }
                        $upit3=$konekcija->prepare($upitDohvatiKorpu);
                        $idk=22;
                        $upit3->bindParam(':idkorpa', $korpaId);
                        $upit3->execute();
                        $rez1=$upit3->fetchAll();
                        // if(!$rez1){
                        //     print_r($konekcija->errorInfo());

                        // }
                        if(count($rez1)>0){
                            $konekcija->commit();
                            $_SESSION['cart']=$rez1;
                        }
                        else{
                            $konekcija->rollBack();


                        }
                        }
                        catch (PDOException $e){
                            //print_r($konekcija->errorInfo());
                            echo 'Database Error '.$e->getMessage().' in '.$e->getFile().
                            ': '.$e->getLine();
                        }
                        
                        $_SESSION['korisnik']=$rez;
                        //var_dump($_SESSION['korisnik']);
                       header("Location:korisnik.php");
                        
                        
                    }
                    else{
                        $greske[]="Pogresan email ili lozinka.";
                        $_SESSION['greske']=$greske;
                        header("Location:logovanje.php");
                        
                    }
                }
                catch(PDOException $e){
                    echo $e->getMessage();
            
                }
            }


                
        }
            
        

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
}





?>