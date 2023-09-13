<?php 
include_once("../baza/konekcija.php");
include_once("../baza/upiti.php");
if(isset($_GET['id'])){
$id=$_GET['id'];
$upit=$konekcija->prepare($slikeProizvod);
$upit->bindParam(":id",$id);
$upit->execute();
$rezultat=$upit->fetchAll();
if($rezultat){
	$ispis="";
	$kategorija="";
	
	foreach($rezultat as $rez){
	
	$ispis.="<div class='item-slick3 proizvod' data-thumb='..".$rez->putanja."' id='".$rez->id."'><div class='wrap-pic-w'>";
	$ispis.="<img src='..".$rez->putanja."' alt='".$rez->alt."'></div></div>";
	$kategorija=$rez->nazivkategorije;

	
	}

}

$upitVel=$konekcija->prepare($upitVelicine);
$upitVel->bindParam(":id", $id);
$upitVel->execute();
$rezultatVelicine=$upitVel->fetchAll();
if($rezultatVelicine){
	$velicine="<option value='0'>Izaberite veličinu</option>";
	foreach($rezultatVelicine as $velicina){
		$velicine.="<option value='".$velicina->idvelicine."'>".$velicina->nazivvelicine."</option>";

	}
}

$upitdetalji=$konekcija->prepare($proizvodDetalji);
$upitdetalji->bindparam(":id",$id);
$upitdetalji->execute();
$rezultatDetalji=$upitdetalji->fetchALL();
if($rezultatDetalji){
	$detalji="";
	$dodatno="";
	foreach($rezultatDetalji as $detalj){
		$detalji.="<h4 class='product-detail-name m-text17 p-b-13'>";
		$detalji.=strtoupper($detalj->nazivproizvoda);
		$detalji.="</h4><span class='m-text16'>";
		$detalji.=$detalj->cena." rsd</span>";
		$detalji.="<p class='s-text8 p-t-10'>";
		$detalji.=$detalj->opis."</p>";

		$dodatno.="<p class='s-text8'>";
		$dodatno.=$detalj->opis."</p>";
	
	}

}


}

?>
<div class="container bgwhite p-t-35 p-b-80">
		<div class="flex-w flex-sb">
			<div class="w-size13 p-t-30 respon5">
				<div class="wrap-slick3 flex-sb flex-w">
					<div class="wrap-slick3-dots">Proba
					<!-- <ul class="slick3-dots" role="tablist" style="">
						<li class="slick-active" role="presentation">
							<img src=" ../slike/dugacke/mermer1.jpg ">
							<div class="slick3-dot-overlay"></div>
						</li>
							<li role="presentation"><img src=" ../slike/dugacke/mermer2.jpg ">
							<div class="slick3-dot-overlay"></div></li><li role="presentation">
								<img src=" ../slike/dugacke/mermer3.jpg "><div class="slick3-dot-overlay">

								</div></li></ul> -->
					</div>

					<div class="slick3">
						<?php echo $ispis;?>
					</div>
				</div>
			</div>

			<div class="w-size14 p-t-30 respon5">
				<?php echo $detalji; ?>
				<!--  -->
				<div class="p-t-33 p-b-60">
					<div class="flex-m flex-w p-b-10">
						<div class="s-text15 w-size15 t-center">
							Veličina
						</div>

						<div class="of-hidden w-size20">
							<select class="size15 bo4" id="velicina" name="velicina" name="size">
								<?php echo $velicine?>
							</select>
						</div>
					</div>

					

					<div class="flex-r-m flex-w p-t-10">
						<div class="w-size16 flex-m flex-w">
							<div class="flex-w bo5 of-hidden m-r-22 m-t-10 m-b-10">
								<button class="btn-num-product-down color1 flex-c-m size7 bg8 eff2">
									<i class="fs-12 fa fa-minus" aria-hidden="true"></i>
								</button>

								<input class="size8 m-text18 t-center num-product" type="number" name="num-product" value="1">

								<button class="btn-num-product-up color1 flex-c-m size7 bg8 eff2">
									<i class="fs-12 fa fa-plus" aria-hidden="true"></i>
								</button>
							</div>

							<div class="btn-addcart-product-detail size9 trans-0-4 m-t-10 m-b-10">
								<!-- Button -->
								<button class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4">
									Dodaj u korpu
								</button>
							</div>
						</div>
					</div>
				</div>

				<div class="p-b-45">
					<span class="s-text8">KATEGORIJA:    <?php echo ($kategorija); ?> </span>
				</div>

				<!--  -->
				<div class="wrap-dropdown-content bo6 p-t-15 p-b-14 active-dropdown-content">
					<h5 class="js-toggle-dropdown-content flex-sb-m cs-pointer m-text19 color0-hov trans-0-4">
						OPIS:
						<i class="down-mark fs-12 color1 fa fa-minus dis-none" aria-hidden="true"></i>
						<i class="up-mark fs-12 color1 fa fa-plus" aria-hidden="true"></i>
					</h5>

					<div class="dropdown-content dis-none p-t-15 p-b-23">
						<?php echo $dodatno ?>
					</div>
				</div>

				<div class="wrap-dropdown-content bo7 p-t-15 p-b-14">
					<h5 class="js-toggle-dropdown-content flex-sb-m cs-pointer m-text19 color0-hov trans-0-4">
						DODATNE INFORMACIJE:
						<i class="down-mark fs-12 color1 fa fa-minus dis-none" aria-hidden="true"></i>
						<i class="up-mark fs-12 color1 fa fa-plus" aria-hidden="true"></i>
					</h5>

					<div class="dropdown-content dis-none p-t-15 p-b-23">
						<?php echo $dodatno ?>
					</div>
				</div>

				
			</div>
		</div>
	</div>