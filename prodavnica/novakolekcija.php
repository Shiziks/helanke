<?php
session_start();
include_once("head.php");
include_once("header.php");
?>
		<!-- Content page -->
	<section class="bgwhite p-t-55 p-b-65">
		<div class="container">
			<div class="row">
				<div class="col-sm-6 col-md-4 col-lg-3 p-b-50">
					<div class="leftbar p-r-20 p-r-0-sm">
						<!--  -->
						<h4 class="m-text14 p-b-7">
							Kategorije
						</h4>

						<?php include("bocnimeni.php"); ?>

						<!--  -->
						

						<div class="filter-color p-t-22 p-b-50 bo3">
							<div class="m-text15 p-b-12">
								Boja
							</div>

							<ul class="flex-w bojadugme">
								<li class="m-r-10">
									<input class="checkbox-color-filter" id="color-filter1" type="checkbox" name="color-filter1">
									<label class="color-filter color-filter1 dugmeboja" data-boja="plava" for="color-filter1"></label>
								</li>

								<li class="m-r-10">
									<input class="checkbox-color-filter" id="color-filter2" type="checkbox" name="color-filter2">
									<label class="color-filter color-filter2 dugmeboja" data-boja="zelena" for="color-filter2"></label>
								</li>

								<li class="m-r-10">
									<input class="checkbox-color-filter" id="color-filter3" type="checkbox" name="color-filter3">
									<label class="color-filter color-filter3 dugmeboja" data-boja="roze" for="color-filter3"></label>
								</li>

								<li class="m-r-10">
									<input class="checkbox-color-filter" id="color-filter4" type="checkbox" name="color-filter4">
									<label class="color-filter color-filter4 dugmeboja" data-boja="žuta" for="color-filter4"></label>
								</li>

								<li class="m-r-10">
									<input class="checkbox-color-filter" id="color-filter5" type="checkbox" name="color-filter5">
									<label class="color-filter color-filter5 dugmeboja" data-boja="braon" for="color-filter5"></label>
								</li>

								<li class="m-r-10">
									<input class="checkbox-color-filter" id="color-filter6" type="checkbox" name="color-filter6">
									<label class="color-filter color-filter6 dugmeboja" data-boja="crna" for="color-filter6"></label>
								</li>

								<li class="m-r-10">
									<input class="checkbox-color-filter" id="color-filter7" type="checkbox" name="color-filter7">
									<label class="color-filter color-filter7 dugmeboja" data-boja="siva" for="color-filter7"></label>
								</li>
							</ul>
						</div>

						<div class="search-product pos-relative bo4 of-hidden">
							<input class="s-text7 size6 p-l-23 p-r-50" type="text" name="search-product" placeholder="Search Products...">

							<button class="flex-c-m size5 ab-r-m color2 color0-hov trans-0-4">
								<i class="fs-12 fa fa-search" aria-hidden="true"></i>
							</button>
						</div>
					</div>
				</div>

				<div class="col-sm-6 col-md-8 col-lg-9 p-b-50">
					<!--  -->
					<div class="flex-sb-m flex-w p-b-35">
						<div class="flex-w">
							<div class="w-size12 m-t-5 m-b-5 m-r-10">
								<select class="size12 bo4 s-text13" id="sort" name="sorting">
									<option value="1">Prikaz proizvoda</option>
									<option value="2">Po imenu od A-Z</option>
									<option value="3">Po imenu od Z-A</option>
									<option value="4">Po ceni na više</option>
									<option value="5">Po ceni na niže</option>
								</select>
							</div>

						</div>

						<span class="s-text8 p-t-5 p-b-5">
							
                        </span>
					</div>
					<div id="proizvodi" class="row">
						<?php include_once("novakolekcijasadrzaj.php");?>
						
						
					
					    
					</div>
				</div>
			</div>
		</div>
	</section>
	

<?php

include_once("footer.php");

?>