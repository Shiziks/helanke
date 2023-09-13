<?php 
session_start();
include_once("head.php");
include_once("headerindex.php");

?>

<section class="banner2 bg5 p-t-55 p-b-55">
	<div class="container">
        <div class="row">
            <div class="col-sm-8 col-md-6 col-lg-4 m-l-r-auto p-t-15 p-b-15">
                <div class="wrap_menu">
                    <h3 class="m-text5 t-center">
                        Rezultati
                    </h3>
                    <ul class="meni-korisnik t-center p-t-25">
                        <li class="p-b-10">
                            <a href="korisnik.php">Profil</a>
                                
                        </li>

                        <li class="p-b-10">
                            <a href="../html/product.html">Istorija Kupovine</a>
                        </li> 
                        <li class="p-b-10">
                                <a href="korisnikIzmenaLozinke.php">Promeni Lozinku</a>
                        </li>
                    </ul> 
                </div>
            </div>
            <div class="col-sm-12 col-md-10 col-lg-8 m-l-r-auto p-t-15 p-b-15">
                <div class="wrap t-center">
                    <span class="m-text4 p-t-45 fs-20-sm">
                        Koliko ste:
                    </span>
                    <form class="sirina-izmeni" id="izmenaPodatakaKorisnik" name="izmenaPodatakaKorisnik" method="POST" action="#"><!--return ProveraIzmene()-->
    
    <span class="m-text18 p-t-45 fs-20-sm">
    Zadovoljni na našim proizvodima?
    </span>
	<div class="bo4 of-hidden size15 m-b-20">
    <select class="bo4 of-hidden size15 m-b-20 s-text7 p-l-22" name="grad" id="grad"></select>
    </div>

    <span class="m-text18 p-t-45 fs-20-sm">
    Zadovoljni našom uslugom dostave?
    </span>          
	<div class="bo4 of-hidden size15 m-b-20">
    <select class="bo4 of-hidden size15 m-b-20 s-text7 p-l-22" name="grad" id="grad"></select>
	</div>
    
    <span class="m-text18 p-t-45 fs-20-sm">
    Zadovoljni na našom korisničkom službom?
    </span>
    <div class="bo4 of-hidden size15 m-b-20">
    <select class="bo4 of-hidden size15 m-b-20 s-text7 p-l-22" name="grad" id="grad"></select>
	</div>

    <span class="m-text18 p-t-45 fs-20-sm">
    Upišite svoj email:
    </span>
    <div class="bo4 of-hidden size15 m-b-20">
    <input class="sizefull s-text7 p-l-22 p-r-22" type="text" name="ime" id="ime" value=""><br/>

	</div>
    

	<div class="flex-w p-b-20">
		<div class="rs2-select2 of-hidden w-size12 ddl">
                    <div class="m-text2 p-t-10 fs-15-sm  trans-0-4 t-center">
                        <a href="logout.php">Izloguj se</a>
                    </div>
            
                </div>
            </div>
        </div>
	</div>
</section>

<?php include_once("footer.php");?>
