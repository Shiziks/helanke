    <?php include_once("sliderpodaci.php");?>
    <!-- Slide1 -->
	<section class="slide1">
		<div class="wrap-slick1">
			<div class="slick1">
			<div class="item-slick1 item1-slick1" style="background-image: url(./<?php echo $rezultat[0]->putanja;?>);">
					<div class="wrap-content-slide1 sizefull flex-col-c-m p-l-15 p-r-15 p-t-150 p-b-170">
						<span class="caption1-slide1 m-text1 t-center animated visible-false m-b-15" data-appear="fadeInDown">
							<?php echo $rezultat[0]->naslov1; //Women Collection 2018?>
						</span>

						<h2 class="caption2-slide1 xl-text1 t-center animated visible-false m-b-37" data-appear="fadeInUp">
							<?php echo $rezultat[0]->naslov2; //New arrivals?>
						</h2>

						<div class="wrap-btn-slide1 w-size1 animated visible-false" data-appear="zoomIn">
							<!-- Button -->
							<a href="./prodavnica/novakolekcija.php" class="flex-c-m size2 bo-rad-23 s-text2 bgwhite hov1 trans-0-4">
								<?php echo $rezultat[0]->tekst; //Shop Now?>
							</a>
						</div>
					</div>
				</div>

				<div class="item-slick1 item2-slick1" style="background-image: url(./<?php echo $rezultat[1]->putanja;?>);">
					<div class="wrap-content-slide1 sizefull flex-col-c-m p-l-15 p-r-15 p-t-150 p-b-170">
						<span class="caption1-slide1 m-text1 t-center animated visible-false m-b-15" data-appear="rollIn">
						<?php echo $rezultat[1]->naslov1; //Women Collection 2018?>
						</span>

						<h2 class="caption2-slide1 xl-text1 t-center animated visible-false m-b-37" data-appear="lightSpeedIn">
						<?php echo $rezultat[1]->naslov2; //New arrivals?>
						</h2>

						<div class="wrap-btn-slide1 w-size1 animated visible-false" data-appear="slideInUp">
							<!-- Button -->
							<a href="./prodavnica/prodavnica.php" class="flex-c-m size2 bo-rad-23 s-text2 bgwhite hov1 trans-0-4">
							<?php echo $rezultat[1]->tekst; //Shop Now?>
							</a>
						</div>
					</div>
				</div>

				<div class="item-slick1 item3-slick1" style="background-image: url(./<?php echo $rezultat[2]->putanja;?>);">
					<div class="wrap-content-slide1 sizefull flex-col-c-m p-l-15 p-r-15 p-t-150 p-b-170">
						<span class="caption1-slide1 m-text1 t-center animated visible-false m-b-15" data-appear="rotateInDownLeft">
						<?php echo $rezultat[2]->naslov1; //Women Collection 2018?>
						</span>

						<h2 class="caption2-slide1 xl-text1 t-center animated visible-false m-b-37" data-appear="rotateInUpRight">
						<?php echo $rezultat[2]->naslov2; //New arrivals?>
						</h2>

						<div class="wrap-btn-slide1 w-size1 animated visible-false" data-appear="rotateIn">
							<!-- Button -->
							<a href="./prodavnica/snizenje.php" class="flex-c-m size2 bo-rad-23 s-text2 bgwhite hov1 trans-0-4">
							<?php echo $rezultat[2]->tekst; //Shop Now?>
							</a>
						</div>
					</div>
				</div>

			</div>
		</div>
	</section>