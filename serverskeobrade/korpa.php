<?php
    session_start();
    $greske=[];
    $podaci=NULL;

///////////////////////////////HVATANJE PODATAKA//////////////////////////
    $obj=$_POST['data'];
    if(!isset($obj) and empty($obj)){
        $greske[]="Nepotpuni podaci.";
        $code=422;
        $podaci=$greske;
    }
    else{
        $obj=json_decode($obj);
        $kid=$obj[0]->kid;
        $idkorisnika=$obj[0]->idkorisnika;
        include("../baza/konekcija.php");
        if($konekcija){
            include("../baza/upiti.php");
            if($kid==0){
                $upit=$konekcija->prepare($upitNovaKorpa);
                $rez=$upit->execute();
                if($rez){
                    $kid=$konekcija->lastInsertId();
                    $success=1;
                    foreach($obj as $one){
                        $pid=$one->pid;
                        $kolicina=$one->kolicina;
                        $upit1=$konekcija->prepare($upitKorpaPodaci);
                        $upit1->bindParam(':idkorpa', $kid);
                        $upit1->bindParam(':idkorisnika', $idkorisnika);
                        $upit1->bindParam(':idproizvod', $pid);
                        $upit1->bindParam(':kolicina', $kolicina);
                        $rez1=$upit1->execute();
                        if(!$rez1){
                            $greske[]="Nije se upisalo u bazu";
                            $success=0;
                        }
                        else{
                            $success=1;
                        }
                    }
                    if($success==1){
                        $upit2=$konekcija->prepare($upitDohvatiKorpu);
                            $upit2->bindParam(':idkorpa', $kid);
                            $upit2->execute();
                            $rez2=$upit2->fetchAll();
                            if($rez2){
                                $podaci=$rez2;
                                $_SESSION['cart']=$rez2;
                                $code=201;
                            }
                            else{
                                $_SESSION['cart']=[];
                                $code=500;
                                $podaci=$greske;
                            }
                    }
                    else{
                        $_SESSION['cart']=[];
                        $code=501;
                        $podaci=$greske;
                    }
                }
                else{
                    $_SESSION['cart']=[];
                    $code=501;
                    $greske[]="Nije upisana korpa";
                    $podaci=$greske;
                }
            }
            else{
                /////OVO JE AKO VEC POSTOJI KORPA TREBA DA MENJA POSTOJECU
                if($obj[0]->pid!=0){
                    $success=0;
                    foreach($obj as $one){
                        //da proveri da li vec postoji u bazi
                        $pid=$one->pid;
                        $upitDaliPostoji=$konekcija->prepare($upitDaliPostojiProizvdUKorpi);
                        $upitDaliPostoji->bindParam(':kid', $kid);
                        $upitDaliPostoji->bindParam(':pid', $pid);
                        $upitDaliPostoji->execute();
                        $rez3=$upitDaliPostoji->fetchAll();
                        if(!$rez3){
                            $upitUpisUKorpu=$konekcija->prepare($upitKorpaPodaci);
                            $upitUpisUKorpu->bindParam(':idkorpa', $kid);
                            $upitUpisUKorpu->bindParam(':idkorisnika', $idkorisnika);
                            $upitUpisUKorpu->bindParam(':idproizvod', $pid);
                            $upitUpisUKorpu->bindParam(':kolicina', $one->kolicina);
                            $rez4=$upitUpisUKorpu->execute();
                            if(!$rez4){
                               $greske[]="Nije se upisao proizvod u korpu.";
                               $success=0;
                            }
                            else{
                                $success=1;
                                $podaci=$rez4;
                            }
                        }
                        else{
                            $success=1;
                        }

                    }
                    if($success==1){
                        $upitDohvatiKorpu=$konekcija->prepare($upitDohvatiKorpu);
                        $upitDohvatiKorpu->bindParam(':idkorpa', $kid);
                        $upitDohvatiKorpu->execute();
                        $rez5=$upitDohvatiKorpu->fetchAll();
                        if($rez5){
                            $podaci=$rez5;
                            $_SESSION['cart']=$rez5;
                            $code=201;
                        }
                        else{
                            $greske[]="Nije se dohvatila korpa. Proveri.";
                            $code=401;
                            $podaci=$greske;
                        }
                    }
                    else{
                        $greske[]="Nije se upisala korpa proveri.";
                        $code=401;
                        $podaci=$greske;
                    }
                    
                }
                else if ($obj[0]->pid==0){
                    $upitDohvatiKorpu=$konekcija->prepare($upitDohvatiKorpu);
                    $upitDohvatiKorpu->bindParam(':idkorpa', $kid);
                    $upitDohvatiKorpu->execute();
                    $rez5=$upitDohvatiKorpu->fetchAll();
                    if($rez5){
                        $podaci=$rez5;
                        $_SESSION['cart']=$rez5;
                        $code=201;
                    }
                    else{
                        $greske[]="Nije se upisala korpa proveri podatke";
                        $code=401;
                        $podaci=$greske;
                    }
                }

            }

        }
        
    }
    http_response_code($code);
    echo json_encode($podaci);
