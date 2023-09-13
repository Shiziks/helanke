<?php    
include_once("../baza/konekcija.php");
include_once("../baza/upiti.php");

if($konekcija){
	
	$ispis="<ul class='p-b-54'>";
	$upit=$konekcija->prepare($upitbocnimeni);
	$upit->execute();
	$rezultat=$upit->fetchAll();
	foreach($rezultat as $rez){

		$ispis.="<li class='p-t-4'><a href='".$rez->link."' class='s-text13'>";
		$ispis.=$rez->stavka."</a></li>";
			
	}
	$ispis.="</ul>";
	
	echo $ispis;

}
else header("Location:./prodavnica.php");

?>

    