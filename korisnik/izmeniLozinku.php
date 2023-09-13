<?php
include_once("../baza/podaciKorisnik.php");
?>

<div id="wrap t-center">
<form class="sirina-izmeni p-t-40" id="izmenaLozinke" name="izmenaLozinke" method="POST" action="#"><!--return ProveraIzmene()-->
    <div class="bo4 of-hidden size15 m-b-20">				
        <input type="hidden" name="uloga" id="uloga" value="<?php echo $idUloga; ?>">
        <input type="hidden" name="id" id="id" value="<?php echo $id; ?>">
        <input class="sizefull s-text7 p-l-22 p-r-22" type="password" name="pas" id="pas" placeholder="Unesite Novu Lozinku"><br/>
    </div>
    
	<div class="bo4 of-hidden size15 m-b-30">
		<input class="sizefull s-text7 p-l-22 p-r-22" type="password" name="pas1" id="pas1" placeholder="Ponovite Lozinku">
    </div>             
		
	<div class="of-hidden size15 m-b-30">
		<div class="w-size25 t-center centriraj">
			<!-- Submit -->
			<input type="button" id="btnSubmit" name="btnSubmit" class="flex-c-m size2 bg1 bo-rad-20 hov1 m-text3 trans-0-4" value="Izmeni"/>
							
		</div>
	</div>
</form>
<div class="of-hidden boja s-text7 t-center p-t-10" id="greske">

</div>
</div>


 

