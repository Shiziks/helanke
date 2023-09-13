<?php
$url=$_SERVER['HTTP_HOST']; 
$url.=$_SERVER['REQUEST_URI'];    
if(isset($_SESSION['korisnik'])){
    //var_dump(10);
    $id=$_SESSION['korisnik'][0]->iduloga;

    if($id==16){
        if(str_contains($url, '/cart/cart.php')){
            echo ('../korisnik/korisnik.php');
        }
        else{
            echo ('../korisnik/korisnik.php');
        }
    //header("Location:korisnik/korisnik.php");
}
else if($id==15){
    
    echo("adminpanel/adminpanel.php");
    //header("Location:adminpanel/adminpanel.php");
    
    
}
}
else{
    //var_dump(11);
    echo("../korisnik/logovanje.php");
    //header("Location:korisnik/logovanje.php");
}


?>
