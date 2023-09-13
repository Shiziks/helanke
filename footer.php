    <!-- Footer -->
    <?php //bla ?>
	<!-- Footer -->
	<footer class="bg6 p-t-45 p-b-43 p-l-45 p-r-45">
		<div class="flex-w p-b-90">
			<div class="w-size6 p-t-30 p-l-15 p-r-15 respon3">
				<h4 class="s-text12 p-b-30">
					KONTAKTIRAJTE NAS
				</h4>

				<div>
					<p class="s-text7 w-size27 mar">
						Za odgovor na bilo koje pitanje pišite putem emaila: <br/>
						pop-leggings@bla.com <br/>
						ili nas pozovite na: <br/>
						063/ 111 222
					</p>

					<div class="flex-m p-t-30">
						<a href="#" class="fs-18 color1 p-r-20 fa fa-facebook"></a>
						<a href="#" class="fs-18 color1 p-r-20 fa fa-instagram"></a>
						<a href="#" class="fs-18 color1 p-r-20 fa fa-pinterest-p"></a>
						<a href="#" class="fs-18 color1 p-r-20 fa fa-snapchat-ghost"></a>
						<a href="#" class="fs-18 color1 p-r-20 fa fa-youtube-play"></a>
					</div>
				</div>
			</div>

			<div class="w-size7 p-t-30 p-l-15 p-r-15 respon4 mar">
				<h4 class="s-text12 p-b-30">
					Kategorije
				</h4>

				<?php include("bocnimeni.php"); ?>
			</div>

			

			<div class="w-size7 p-t-30 p-l-15 p-r-15 respon4 mar">
				<h4 class="s-text12 p-b-30">
					INFO
				</h4>

				<ul>
					<li class="p-b-9">
						<a href="#" class="s-text7">
							O Autoru
						</a>
					</li>

					<li class="p-b-9">
						<a href="#" class="s-text7">
							Anketa
						</a>
					</li>

					<li class="p-b-9">
						<a href="#" class="s-text7">
							Logovanje
						</a>
					</li>

				</ul>
			</div>

			<div class="w-size8 p-t-30 p-l-15 p-r-15 respon3 mar">
				<h4 class="s-text12 p-b-30">
					Novosti
				</h4>

				<form>
					<div class="effect1 w-size9">
						<input class="s-text7 bg6 w-full p-b-5" type="text" name="email" placeholder="email@example.com">
						<span class="effect1-line"></span>
					</div>

					<div class="w-size2 p-t-20">
						<!-- Button -->
						<button class="flex-c-m size2 bg4 bo-rad-23 hov1 m-text3 trans-0-4">
							Pošalji
						</button>
					</div>

				</form>
			</div>
		</div>

		<div class="t-center p-l-15 p-r-15">
			<a href="#">
				<img class="h-size2" src="images/icons/paypal.png" alt="IMG-PAYPAL">
			</a>

			<a href="#">
				<img class="h-size2" src="images/icons/visa.png" alt="IMG-VISA">
			</a>

			<a href="#">
				<img class="h-size2" src="images/icons/mastercard.png" alt="IMG-MASTERCARD">
			</a>

			<a href="#">
				<img class="h-size2" src="images/icons/express.png" alt="IMG-EXPRESS">
			</a>

			<a href="#">
				<img class="h-size2" src="images/icons/discover.png" alt="IMG-DISCOVER">
			</a>

			<div class="t-center s-text8 p-t-20">
				Copyright © 2018 All rights reserved. | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
			</div>
		</div>
	</footer>



	<!-- Back to top -->
	<div class="btn-back-to-top bg0-hov" id="myBtn">
		<span class="symbol-btn-back-to-top">
			<i class="fa fa-angle-double-up" aria-hidden="true"></i>
		</span>
	</div>

	<!-- Container Selection1 -->
	<div id="dropDownSelect1"></div>



<!--===============================================================================================-->
	<script type="text/javascript" src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="vendor/bootstrap/js/popper.js"></script>
	<script type="text/javascript" src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="vendor/select2/select2.min.js"></script>
	<script type="text/javascript">
		$(".selection-1").select2({
			minimumResultsForSearch: 20,
			dropdownParent: $('#dropDownSelect1')
		});
	</script>
<!--===============================================================================================-->
	<script type="text/javascript" src="vendor/slick/slick.min.js"></script>
	<script type="text/javascript" src="js/slick-custom.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="vendor/lightbox2/js/lightbox.min.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="vendor/sweetalert/sweetalert.min.js"></script>
	<script type="text/javascript">
		$('.block2-btn-addcart').each(function(){
			console.log("TU SAM");
			var nameProduct = $(this).parent().parent().parent().find('.block2-name').html();
			$(this).on('click', function(){
				cart=localStorage.getItem('proizvodi');
				console.log("PRI UCITAVANJU CART JE");
				console.log(cart);
				if(cart=='null' || cart==undefined){
					cart=0;
				}
				else{
					cart=JSON.parse(cart);
					proizvodi=cart;
				}
				console.log($(this));
				let cena=$(this)[0].dataset.cena;
				let putanja=$(this)[0].dataset.putanja;
				let naziv=$(this)[0].dataset.naziv;
				swal(nameProduct, "su dodate u korpu !", "success");
				var el=document.querySelector(".header-icons-noti");
				var num=Number(el.innerHTML);
				el.innerHTML=num+1; 
				let id=$(this)[0].id;
				let proizvod={
					id:id,
					cena:cena,
					putanja,putanja,
					naziv:naziv
				}
				console.log(proizvod);
				proizvodi.push(proizvod);
				console.log(typeof proizvodi)
				console.log(proizvodi);
				localStorage.setItem('proizvodi',JSON.stringify(proizvodi));
			});
		});

		$('.block2-btn-addwishlist').each(function(){
			var nameProduct = $(this).parent().parent().parent().find('.block2-name').html();
			$(this).on('click', function(){
				swal(nameProduct, "is added to wishlist !", "success");
			});
		});
	</script>

<!--===============================================================================================-->
	<script src="./js/main.js"></script>
	<script src="./js/filtriranjebojaAjax.js"></script>
	<script src="./js/sortiranjeAjax.js"></script>
	<script src="./korisnickeobrade/prodavnica.js"></script>
	<script src="./js/indexjs.js"></script>


</body>
</html>
