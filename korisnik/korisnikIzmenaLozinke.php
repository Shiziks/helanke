<?php
    session_start();
    //echo("zdravo");
    //var_dump($_SESSION['korisnik']);
    if(isset($_SESSION['korisnik']) and ($_SESSION['korisnik'][0]->iduloga==16)){ //dodati i da je uloga =16
    include_once("headkorisnik.php");
    include_once("heder.php");
    //include_once("logo.php");
    include("../baza/konekcija.php");
    
?>


<section class="banner2 bg5 p-t-55 p-b-55">
	<div class="container">
        <div class="row">
            <div class="col-sm-8 col-md-6 col-lg-4 m-l-r-auto p-t-15 p-b-15">
                <div class="wrap_menu">
                    <h3 class="m-text5 t-center">
                        <?php include_once("../baza/podaciKorisnik.php");
                        echo $ime." ".$prezime;
                        ?>
                    </h3>
                    <ul class="meni-korisnik t-center p-t-25">
                        <li class="p-b-10 p-t-10">
                            <a href="korisnik.php">Profil</a>
                                
                        </li>

                        <li class="p-b-10 p-t-10">
                            <a href="product.html">Istorija Kupovine</a>
                        </li> 
                        <li class="p-b-10 p-t-10">
                            <a href="korisnikPromenapodataka.php">Izmeni Podatke</a>
                        </li>
                        <li class="p-b-10 p-t-10">
                        <a href="logout.php">Izloguj se</a>
                        </li>
                    </ul> 
                </div>
            </div>
            <div class="col-sm-12 col-md-10 col-lg-8 m-l-r-auto p-t-15 p-b-15">
                <div class="wrap t-center">
                    <span class="m-text4 p-t-45 fs-20-sm pb-30">
                        Izmeni Lozinku:
                    </span>
                    <?php
                        include_once("izmeniLozinku.php");
                    ?>
                    <!-- <div class="m-text2 p-t-10 fs-15-sm  trans-0-4 t-center">
                        
                    </div> -->
                </div>
            </div>
        </div>
	</div>
</section>

<?php include_once("footerkorisnik.php");?>
<script src="../js/main.min.js"></script>
<script src="../korisnickeobrade/proveraKlijentskaLozinka.js"></script>
<?php 
}
else{
    header("Location:logovanje.php");
}

?>

	
	
 