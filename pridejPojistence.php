<?php
$link = mysqli_connect("localhost", "root", "", "databaze_pojistencu");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Escape user inputs for security
$jmeno = mysqli_real_escape_string($link, $_REQUEST['jmeno']);
$prijmeni = mysqli_real_escape_string($link, $_REQUEST['prijmeni']);
$ulice = mysqli_real_escape_string($link, $_REQUEST['ulice']);
$mesto = mysqli_real_escape_string($link, $_REQUEST['mesto']);
$psc = mysqli_real_escape_string($link, $_REQUEST['psc']);
$email = mysqli_real_escape_string($link, $_REQUEST['email']);
$telefon = mysqli_real_escape_string($link, $_REQUEST['telefon']);
// Attempt insert query execution
$sql = "INSERT INTO pojistenci (jmeno, prijmeni, ulice, mesto, psc, email, telefon) VALUES ('$jmeno', '$prijmeni', '$ulice', '$mesto', '$psc', '$email', '$telefon')";
if(mysqli_query($link, $sql)){
    header("Location: http://localhost/uspesneVlozeniPojistence.html");
exit();
} else{
    header("Location: http://localhost/neuspesneVlozeniPojistence.html");
}
 
// Close connection
mysqli_close($link);
?>