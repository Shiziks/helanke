
<?php 
session_start();
if(isset($_SESSION['korisnik'])){
	if(isset($_SESSION['cart'])){
		$cart=$_SESSION['cart'];
		$cartId=$cart[0]->idkorpa;
	}
	else{
		$cart=0;
	} 
	
	include_once('head.php');
	include_once ('heder.php');	
}
else{
	header('Location: ../korisnik/logovanje.php');
}


?>

	<!-- Cart -->
	<section class="cart bgwhite p-t-70 p-b-100">
		<div class="container">
			<div>
			<!-- Cart item -->
			<!-- DODATI HIDDEN INPUT SA ID KORPE KAKO BI SE ID KORPE UPISALA U LOCAL STORAGE -->
			<div class="container-table-cart pos-relative">
				<!-- <div><?php //var_dump($cart)?></div> -->
				<input type="hidden" value="<?php echo $cartId?>" id="<?php echo $cartId ?>"/>
				<div class="wrap-table-shopping-cart bgwhite">
					<table class="table-shopping-cart">
						<tr class="table-head">
							<th class="column-1"></th>
							<th class="column-2">Proizvod</th>
							<th class="column-3">Cena</th>
							<th class="column-4 p-l-70">Količina</th>
							<th class="column-5">Ukupno</th>
							
						</tr>

						<?php 
						if($cart==0 || count($cart)==0){
							$ispis='<tr class="table-row"><td class="column-1" colspan="5">';
							$ispis.='<div class="text-center">Vaša korpa je trenutno prazna.</div></td></tr>';
							echo $ispis;
						}
						else{
							foreach($cart as $item){
								$cenatmp=$item->cena;
								$popust=$item->popust;
								if($popust>0){
									$cenapopust=ceil($cenatmp-($cenatmp*($popust/100)));
									$cena=$cenapopust;
								}
								else{
									$cena=$cenatmp;
								}
								$ispis='<tr class="table-row"><td class="column-1"><div class="cart-img-product b-rad-4 o-f-hidden" id="'.$item->idkorpa.'" data-pid="'.$item->id.'">';
								$ispis.='<img src="..'.$item->putanja.'" alt="IMG-PRODUCT"></div></td>';
								$ispis.='<td class="column-2">'.$item->naziv.'</td><td class="column-3">'.$cena.' RSD</td><td class="column-4">';
								$ispis.='<div class="flex-w bo5 of-hidden w-size17"><button  data-id="'.$item->id.'" class="btn-num-product-down color1 flex-c-m size7 bg8 eff2"><i class="fs-12 fa fa-minus" aria-hidden="true"></i></button>';
								$ispis.='<input id="kolicina" class="size8 m-text18 t-center num-product" type="number" name="num-product1" value="1">';
								$ispis.='<button data-id="'.$cena.'" class="btn-num-product-up color1 flex-c-m size7 bg8 eff2"><i class="fs-12 fa fa-plus" aria-hidden="true"></i></button>';
								$ispis.='</div></td><td class="column-5">'.$cena.' RSD</td></tr>';
								echo $ispis;
							}
						}
						?>

						<!-- <tr class="table-row">
							<td class="column-1">
								<div class="cart-img-product b-rad-4 o-f-hidden">
									<img src="../images/item-10.jpg" alt="IMG-PRODUCT">
								</div>
							</td>
							<td class="column-2">Men Tshirt</td>
							<td class="column-3">$36.00</td>
							<td class="column-4">
								<div class="flex-w bo5 of-hidden w-size17">
									<button class="btn-num-product-down color1 flex-c-m size7 bg8 eff2">
										<i class="fs-12 fa fa-minus" aria-hidden="true"></i>
									</button>

									<input class="size8 m-text18 t-center num-product" type="number" name="num-product1" value="1">

									<button class="btn-num-product-up color1 flex-c-m size7 bg8 eff2">
										<i class="fs-12 fa fa-plus" aria-hidden="true"></i>
									</button>
								</div>
							</td>
							<td class="column-5">$36.00</td>
						</tr> -->

						<!-- <tr class="table-row">
							<td class="column-1">
								<div class="cart-img-product b-rad-4 o-f-hidden">
									<img src="../images/item-05.jpg" alt="IMG-PRODUCT">
								</div>
							</td>
							<td class="column-2">Mug Adventure</td>
							<td class="column-3">$16.00</td>
							<td class="column-4">
								<div class="flex-w bo5 of-hidden w-size17">
									<button class="btn-num-product-down color1 flex-c-m size7 bg8 eff2">
										<i class="fs-12 fa fa-minus" aria-hidden="true"></i>
									</button>

									<input class="size8 m-text18 t-center num-product" type="number" name="num-product2" value="1">

									<button class="btn-num-product-up color1 flex-c-m size7 bg8 eff2">
										<i class="fs-12 fa fa-plus" aria-hidden="true"></i>
									</button>
								</div>
							</td>
							<td class="column-5">$16.00</td>
						</tr> -->
					</table>
				</div>
			</div>

			<div class="flex-w flex-sb-m p-t-25 p-b-25 bo8 p-l-60 p-r-60 p-lr-15-sm">
				<div class="size10 trans-0-4 m-t-10 m-b-10">
					<a class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4" href='./cart.php'>
						Azuriraj korpu
					</a>
					<!-- <div class="size11 bo4 m-r-10">
						<input class="sizefull s-text7 p-l-22 p-r-22" type="text" name="coupon-code" placeholder="Coupon Code">
					</div>

					<div class="size12 trans-0-4 m-t-10 m-b-10 m-r-10">
						<button class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4">
							Apply coupon
						</button>
					</div> -->
				</div>

				<div class="size10 trans-0-4 m-t-10 m-b-10">
					<!-- Button -->
					<button class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4">
						Checkout
					</button>
				</div>
			</div>

			<!-- Total -->
			<!-- <div class="bo9 w-size18 p-l-40 p-r-40 p-t-30 p-b-38 m-t-30 m-r-0 m-l-auto p-lr-15-sm">
				<h5 class="m-text20 p-b-24">
					Cart Totals
				</h5>

				<div class="flex-w flex-sb-m p-b-12">
					<span class="s-text18 w-size19 w-full-sm">
						Subtotal:
					</span>

					<span class="m-text21 w-size20 w-full-sm">
						$39.00
					</span>
				</div>

				<div class="flex-w flex-sb bo10 p-t-15 p-b-20">
					<span class="s-text18 w-size19 w-full-sm">
						Shipping:
					</span>

					<div class="w-size20 w-full-sm">
						<p class="s-text8 p-b-23">
							There are no shipping methods available. Please double check your address, or contact us if you need any help.
						</p>

						<span class="s-text19">
							Calculate Shipping
						</span>

						<div class="rs2-select2 rs3-select2 rs4-select2 bo4 of-hidden w-size21 m-t-8 m-b-12">
							<select class="selection-2" name="country">
								<option>Select a country...</option>
								<option>US</option>
								<option>UK</option>
								<option>Japan</option>
							</select>
						</div>

						<div class="size13 bo4 m-b-12">
						<input class="sizefull s-text7 p-l-15 p-r-15" type="text" name="state" placeholder="State /  country">
						</div>

						<div class="size13 bo4 m-b-22">
							<input class="sizefull s-text7 p-l-15 p-r-15" type="text" name="postcode" placeholder="Postcode / Zip">
						</div>

						<div class="size14 trans-0-4 m-b-10">
							<button class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4">
								Update Totals
							</button>
						</div>
					</div>
				</div>

				<div class="flex-w flex-sb-m p-t-26 p-b-30">
					<span class="m-text22 w-size19 w-full-sm">
						Total:
					</span>

					<span class="m-text21 w-size20 w-full-sm">
						$39.00
					</span>
				</div>

				<div class="size15 trans-0-4">
					<button class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4">
						Proceed to Checkout
					</button>
				</div>
			</div> -->
		</div>
	</section>
<?php 
include_once('footer.php')
?>



	