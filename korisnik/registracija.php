<?php 
include_once("headkorisnik.php");
include_once("heder.php");
// include_once("logo.php");
include("../baza/konekcija.php");?>

	<!-- content page -->
<section class="bgwhite p-t-66 p-b-38">
	<div class="container">
		<div class="row justify-content-center">
			<form class="leave-comment sirina" id="registracija" name="registracija" method="POST">
					<h3 class="m-text26 p-b-36 p-t-15 p-l-125">
						<b>Registracija</b>
					</h3>

					<div class="bo4 of-hidden size15 m-b-20">
							
						<input class="sizefull s-text7 p-l-22 p-r-22" type="text" name="ime" id="ime" placeholder="Ime"><br/>
						
					</div>
					

					<div class="bo4 of-hidden size15 m-b-20">
							
							<input class="sizefull s-text7 p-l-22 p-r-22" type="text" name="prezime" id="prezime" placeholder="Prezime">
					</div>
					

					<div class="bo4 of-hidden size15 m-b-20">
							
							<input class="sizefull s-text7 p-l-22 p-r-22" type="text" name="email" id="email" placeholder="Email adresa">
					</div>
					

					<div class="bo4 of-hidden size15 m-b-20">
						<input class="sizefull s-text7 p-l-22 p-r-22" type="password" name="password" id="password" placeholder="Lozinka">
					</div>
					

					<div class="bo4 of-hidden size15 m-b-20">
							<input class="sizefull s-text7 p-l-22 p-r-22" type="password" name="password1" id="password1" placeholder="Ponovite Lozinku">

							<input type="hidden" name="idUloge" id="idUloge" value="1"/>
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
											    $ispis.="<option value='".$r->idgrad."'>".$r->nazivgrada."</option>";
										                        }
                                            echo $ispis;}
                                        else{echo"nema";}
									?>
									
								</select>
							</div>
					</div>

					<div class="of-hidden boja s-text7 p-l-22" id="greske"></div>


					
					<div class="row justify-content-center">
						<div class="w-size25">
							<!-- Submit -->
							<input type="button" id="btnSubmit" name="btnSubmit" class="flex-c-m size2 bg1 bo-rad-20 hov1 m-text3 trans-0-4" value="Registruj se"/>
							
						</div>
					</div>

					
					
				</div>
				
				

			</form>
			<div class="row justify-content-center" >
				<div class="w-size25 s-text7 sirina p-t-20 p-l-20" id="ispis" name="ispis">
				
					
					
				</div>
			</div>
		</div>
	</div>
</section>
	
															
	<?php include_once("footerkorisnik.php");?>
	
	<script src="../js/main.min.js"></script>
	<script src="../korisnickeobrade/proveraKlijentska.js"></script>
    
