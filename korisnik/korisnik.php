<?php
    session_start();
    //var_dump($_SESSION['cart']);
    //echo("zdravo");
    //var_dump($_SESSION['korisnik']);
    if(isset($_SESSION['korisnik']) and ($_SESSION['korisnik'][0]->iduloga==16)){ //dodati i da je uloga =16
    include_once("headkorisnik.php");
    include_once("heder.php");
    include_once("../baza/konekcija.php");
   // include_once("../baza/podaciKorisnik.php");
    if(isset($_SESSION['cart'])){
        $cart=$_SESSION['cart'];
        $cartId=$cart[0]->idkorpa;
    } 
    $ime=$_SESSION['korisnik'][0]->ime;
    $prezime=$_SESSION['korisnik'][0]->prezime;
    $email=$_SESSION['korisnik'][0]->email;
    $grad=$_SESSION['korisnik'][0]->nazivgrada;
    $id=$_SESSION['korisnik'][0]->idkorisnika;
    //var_dump($_SESSION['korisnik']);    
    
?>
<section class="banner2 bg5 p-t-55 p-b-55">
		<div class="container">
            <!-- <div><?php //var_dump($_SESSION['korisnik'][0]) ?></div> -->
			<div class="row">
				<div class="col-sm-8 col-md-6 col-lg-4 m-l-r-auto p-t-15 p-b-15">
                    <div class="wrap_menu">
                    <h3 class="m-text5 t-center">
                        <?
                        echo $ime." ".$prezime;
                        ?>
		            </h3>
                        <ul class="meni-korisnik t-center p-t-25">
                            <li class="p-b-10 p-t-10">
                                <a href="korisnik.php">Profil</a>   
                            </li>
                            <li class="p-b-10 p-t-10">
                                <a href="korisnikIzmenaLozinke.php">Promeni Lozinku</a>
                            </li>
                            <li class="p-b-10 p-t-10">
                            <a href="korisnikPromenapodataka.php">Izmeni Podatke</a>
                            </li>
                            
                            <li class="p-b-10 p-t-10">
                                <a href="../cart/cart.php">Korpa</a>
                            </li> 

                            
                        </ul> 
                    </div>
					
				</div>

				<div class="col-sm-12 col-md-10 col-lg-8 m-l-r-auto p-t-15 p-b-15">
                    <div class="wrap t-center">
                        <span class="m-text4 p-t-45 fs-20-sm p-b-30">
                            Vaši Podaci:
                        </span>
                        <?php
                            
                            $ispis="<ul class='p-t-25'><li class='p-b-10 p-t-10' id='".$id."'>".$ime." ".$prezime."</li>";
                            $ispis.="<li class='p-b-10'>".$email."</li>";
                            $ispis.="<li class='p-b-10'>".$grad."</li></ul>";
                            $ispis.="<input type='hidden' class='idkorisnika' value='".$id."' id='idkorisnika'/>";
                            $ispis.="<input type='hidden' class='idkorpe' value='".$cartId."' id='idkorpe'/>";
                            echo $ispis;
                        ?>
                        

                        <div class="button m-t-30">
                            <form action="logout.php" name="logoutbutton" id="logoutbutton" method="POST" onsubmit="return Logout()">
                            <button type="submit" class="trans-0-4 t-center flex-c-m size2 bg4 bo-rad-23 hov1 m-text3 trans-0-4">Izloguj se</button>
                            </form>
                        </div>


                    </div>
				
				</div>
			</div>
		</div>
	</section>

<?php include_once("footerkorisnik.php");?>

    <?php 
    }
    else {
    header("Location:logovanje.php");
    }
    ?>
 