<?php
$link = mysqli_connect("localhost", "root", "", "databaze_pojistencu");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Escape user inputs for security
$pojistenecId = mysqli_real_escape_string($link, $_REQUEST['pojistenecId']);
$nazev = mysqli_real_escape_string($link, $_REQUEST['nazev']);
$castka = mysqli_real_escape_string($link, $_REQUEST['castka']);
$predmetPojisteni = mysqli_real_escape_string($link, $_REQUEST['predmetPojisteni']);
$od = mysqli_real_escape_string($link, $_REQUEST['od']);
$do = mysqli_real_escape_string($link, $_REQUEST['do']);
// Attempt insert query execution
$sql = "INSERT INTO pojisteni (pojistenecId, nazev, castka, predmetPojisteni, od, do) VALUES ('$pojistenecId','$nazev', '$castka', '$predmetPojisteni', '$od', '$do')";
if(mysqli_query($link, $sql)){
    header("Location: http://localhost/uspesneVlozeniPojisteni.html");
exit();
} else{
    header("Location: http://localhost/neuspesneVlozeniPojisteni.html");
}
 
// Close connection
mysqli_close($link);
?>