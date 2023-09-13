<?php 
include_once("../baza/konekcija.php");
include_once("../baza/upiti.php");
if(isset($_GET['id'])){
$id=$_GET['id'];

$upit=$konekcija->prepare($upitnazivKategorije);
$upit->bindParam(":id",$id);
$upit->execute();
$rezultat=$upit->fetch();
if($rezultat){
	$kategorija=$rezultat->nazivkategorije;
	$idk=$rezultat->idkategorija;
	$naziv=$rezultat->nazivproizvoda;
}
}


?>
<div class="bread-crumb bgwhite flex-w p-l-52 p-r-15 p-t-30 p-l-15-sm">
		<a href="../index.php" class="s-text16">
			Početna
			<i class="fa fa-angle-right m-l-8 m-r-9" aria-hidden="true"></i>
		</a>

		<a href="../prodavnica/prodavnica.php" class="s-text16">
			Proizvodi
			<i class="fa fa-angle-right m-l-8 m-r-9" aria-hidden="true"></i>
		</a>

		<a href="../proizvodi/kategorije.php?id=<?php echo $idk;?>" class="s-text16">
			<?php echo ucfirst($kategorija); ?>
			<i class="fa fa-angle-right m-l-8 m-r-9" aria-hidden="true"></i>
		</a>

		<span class="s-text17">
			<?php echo $naziv; ?>
		</span>
	</div>