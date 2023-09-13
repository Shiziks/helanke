<?php
    session_start();
    $greske=[];
    $podaci=NULL;

///////////////////////////////HVATANJE PODATAKA//////////////////////////
    $pid=$_POST['pid'];
    $kid=$_POST['kid'];
    if(!isset($pid) and empty($pid)){
        $greske[]="Nepotpuni podaci, pid.";
    }
    if(!isset($kid) and empty($kid)){
        $greske[]="Nepotpuni podaci, kid.";
    }

    
    if(count($greske)>0){
        $code=422;
        $podaci=$greske;
    }
    else{
        include("../baza/konekcija.php");
        if($konekcija){
            include("../baza/upiti.php");
            $upit=$konekcija->prepare($upitizmenakorpe);
            $upit->bindParam(':kid', $kid);
            $upit->bindParam(':pid', $pid);

            try{
                $rezultat=$upit->execute();
                if($rezultat){
                    $upitnovakorpa=$konekcija->prepare($upitDohvatiKorpu);
                    $upitnovakorpa->bindParam(':idkorpa', $kid);
                    try{
                        $upitnovakorpa->execute();
                        $novakorpa=$upitnovakorpa->fetchAll();
                        if($novakorpa){
                            $_SESSION['cart']=$novakorpa;
                            $code=201;
                            $podaci=array('message'=>'Uspesno brisanje.');
                        }
                        else{
                            $_SESSION['cart']=[];
                            $code=201;
                            $podaci=array('message='>'Uspesno brisanje, nema vise proizvoda u korpi.'); 
                        }
                    }
                        catch(PDOException $e){
                            echo $e->getMessage();
                            $code=409;
                    
                        }
                }
                else{
                    $code=500;
                    $podaci=array('message'=>'Nije pronadjena korpa');
                }
            }
            catch(PDOException $e){
                echo $e->getMessage();
                $code=409;
        
            }
        }

    }
    http_response_code($code);
    echo json_encode($podaci);


?>