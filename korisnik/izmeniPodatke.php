<?php
//include_once("../baza/podaciKorisnik.php");
?>

<div id="wrap t-center">
<form class="sirina-izmeni p-t-35" id="izmenaPodatakaKorisnik" name="izmenaPodatakaKorisnik" method="POST" action="#"><!--return ProveraIzmene()-->
    <div class="bo4 of-hidden size15 m-b-20">				
        <input type="hidden" name="uloga" id="uloga" value="<?php echo $idUloga; ?>">
        <input type="hidden" name="id" id="id" value="<?php echo $id; ?>">
        <input class="sizefull s-text7 p-l-22 p-r-22" type="text" name="ime" id="ime" value="<?php echo $ime; ?>"><br/>
    </div>
    
	<div class="bo4 of-hidden size15 m-b-20">
		<input class="sizefull s-text7 p-l-22 p-r-22" type="text" name="prezime" id="prezime" value="<?php echo $prezime; ?>">
    </div>
                
	<div class="bo4 of-hidden size15 m-b-20">
        <input class="sizefull s-text7 p-l-22 p-r-22" type="text" name="email" id="email" value="<?php echo $email; ?>">
	</div>

	<div class="flex-w p-b-20">
		<div class="rs2-select2 of-hidden w-size12 ddl">
            <select class="bo4 of-hidden size15 m-b-20 s-text7 p-l-22" name="grad" id="grad">
                <?php
                    $ispis="<option value='0'>Izaberite grad</option>";
                    $upit="SELECT * FROM gradovi";
                    $rezultat=$konekcija->query($upit);
                    //var_dump($rezultat);
                    $rez=$rezultat->fetchAll();
                    //var_dump($rez);
                    if(isset($rez)){
                        foreach($rez as $r){
                            if($r->idgrad==$grad)
                                {$ispis.="<option value='".$r->idgrad."' selected>".$r->nazivgrada."</option>";}
                            else {$ispis.="<option value='".$r->idgrad."' selected>".$r->nazivgrada."</option>";}
                                            }
                        echo $ispis;}
                    else{echo"nema";}
                ?>
									
			</select>
		</div>
	</div>
		
	<div class="of-hidden size15 m-b-10">
		<div class="w-size25 t-center centriraj">
			<!-- Submit -->
			<input type="button" id="btnSubmit" name="btnSubmit" class="flex-c-m size2 bg1 bo-rad-20 hov1 m-text3 trans-0-4" value="Izmeni"/>
							
		</div>
	</div>
</form>
<div class="of-hidden boja s-text7 t-center p-t-10" id="greske">

</div>
</div>


 

