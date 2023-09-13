<?php 
session_start();
include_once("headkorisnik.php");
include_once("heder.php");
include("../baza/konekcija.php");?>

 <!-- content page -->
 <section class="bgwhite p-t-66 p-b-38">
		<div class="container">
			<div class="row justify-content-center">
				<form class="leave-comment sirina" name="formaLogovanje" id="formaLogovanje" method="POST" action="obradaLog.php" onsubmit="return ProveraLog()">
					<h3 class="m-text26 p-b-36 p-t-15 p-l-133">
						<b>Logovanje</b>
					</h3>

					<div class="bo4 of-hidden size15 m-b-20">
							
						<input class="sizefull s-text7 p-l-22 p-r-22" type="text" name="emailLog" id="emailLog" placeholder="Email Adresa">
					</div>

					<div class="bo4 of-hidden size15 m-b-20">
						<input class="sizefull s-text7 p-l-22 p-r-22" type="password" name="passLog" id="passLog" placeholder="Lozinka">
					</div>

					<div class="s-text7 p-l-22  p-b-1">
							<a href="zaboravljenaLozinka.html" class="s-text7"> Zaboravili ste lozinku? </a>
					</div>
					<div id='hiddenInputs'>

					</div>
					<div class="s-text7 p-l-22  p-t-9 boja" id="greske">
					<?php if(isset($_SESSION['greske'])){
						//var_dump($_SESSION['greske']);
						$ispis="<ul class='p-b-20'>";
						$greske=$_SESSION['greske'];
						if(count($greske)>1){
							foreach($greske as $greska){
								$ispis.="<li>".$greska."</li>";
							}
							$ispis.="</ul>";
							echo $ispis;
						}
						else{
							$ispis.="<li>".$greske[0]."</li>";
							echo $ispis;
						}
						//mora se unsetovati sesija da ne bi svaki put kada loaduje stranu pisao jednom
						//zapamcene greske
						unset($_SESSION['greske']);
					}?>
					</div>
					<div class="row justify-content-center">
					<div class="w-size25">
						<!-- Submit -->
						<input type="submit" class="flex-c-m size2 bg1 bo-rad-23 hov1 m-text3 trans-0-4" name="login" id="login" value="Uloguj se"/>
						
					</div>
				</div>
				<div class="row justify-content-center">
					<div class="w-size25 p-t-20">
							<!-- Submit -->
							<a href="registracija.php" class="flex-c-m size2 bg1 bo-rad-23 hov1 m-text3 trans-0-4" >Kreiraj Nalog </a>
							
					</div>
				</div>

				</form>
			</div>
		</div>
	</section>

	

<?php include_once("footerkorisnik.php");?>
