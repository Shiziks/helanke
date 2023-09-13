<?php 
include_once("../head.php");
include_once("heder.php");
include_once("logo.php");
////////////////////////////KONEKCIJA SA BAZOM/////////////////////////////////
include("../baza/konekcija.php");?>

<!-- content page -->
<section class="bgwhite p-t-66 p-b-38">
		<div class="container">
			<div class="row justify-content-center">
				<form class="leave-comment" method="POST" action="<?php $_SERVER['PHP_SELF'];?>">
					<h3 class="m-text26 p-b-5 p-t-15 p-l-17">
						<b>Zaboravljena lozinka</b>
					</h3>
					<span class="s-text7">Poslaćemo vam email za resetovanje lozinke.</span>

					<div class="bo4 of-hidden size15 m-b-20 m-t-20">
							
						<input class="sizefull s-text7 p-l-22 p-r-22" type="text" name="email1" id="email1" placeholder="Unesite email">
					</div>

					
				
				<div class="row justify-content-center">
					<div class="w-size25 p-t-20 p-l-15 p-r-15">
							<!-- Submit -->
							<input type="button" id="posalji" class="flex-c-m size2 bg1 bo-rad-23 hov1 m-text3 trans-0-4" value="Pošalji"/>
							
					</div>
					<div class="w-size25 p-t-20 p-l-15 p-r-15">
							<!-- Submit -->
							<input type="button" id="odustani" class="flex-c-m size2 bg1 bo-rad-23 hov1 m-text3 trans-0-4" value="Odustani"/>
							
					</div>
				</div>

				</form>
			</div>
		</div>
	</section>

<?php include_once("footerkorisnik.php")?>
<script src="../js/main.min.js"></script>
<script src="../korisnickeobrade/lozinkaAjax.js"></script>