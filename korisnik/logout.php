<script src="../korisnickeobrade/logout.js"></script>

<?php
session_start();
if(isset($_SESSION['korisnik'])){
    unset($_SESSION['korisnik']);
}

if(isset($_SESSION['cart'])){
    unset($_SESSION['cart']);
}


?>

<?php
header("Location:logovanje.php");

?>

