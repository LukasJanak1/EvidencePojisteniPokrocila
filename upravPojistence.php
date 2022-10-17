
<?php

function uprav() {
$link = mysqli_connect("localhost", "root", "", "databaze_pojistencu");
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
$jmeno = mysqli_real_escape_string($link, $_REQUEST['jmeno']);
$prijmeni = mysqli_real_escape_string($link, $_REQUEST['prijmeni']);
$ulice = mysqli_real_escape_string($link, $_REQUEST['ulice']);
$mesto = mysqli_real_escape_string($link, $_REQUEST['mesto']);
$psc = mysqli_real_escape_string($link, $_REQUEST['psc']);
$email = mysqli_real_escape_string($link, $_REQUEST['email']);
$telefon = mysqli_real_escape_string($link, $_REQUEST['telefon']);

  $query = "UPDATE pojistenci SET jmeno ='$jmeno', prijmeni = '$prijmeni',ulice = '$ulice', mesto = '$mesto',psc = '$psc',email = '$email',telefon = '$telefon' 
  WHERE jmeno LIKE '$jmeno' AND prijmeni LIKE '$prijmeni'";
  $result = mysqli_query($link,$query);
  if (!$result) {
    header("Location: http://localhost/neuspesnaZmenaPojistence.html");
  }else{
    header("Location:http://localhost/uspesnaZmenaPojistence.html");
    }
 }
 function odstran() {
  $link = mysqli_connect("localhost", "root", "", "databaze_pojistencu");
  if($link === false){
      die("ERROR: Could not connect. " . mysqli_connect_error());
  }
  $pojistenecId = mysqli_real_escape_string($link, $_REQUEST['pojistenecId']);
  
  
    $query = "DELETE FROM pojistenci WHERE pojistenecId LIKE '$pojistenecId'";
    $result = mysqli_query($link,$query);
    if (!$result) {
      header("Location: http://localhost/neuspesneOdstranenyPojistenec.html");
    }else{
      header("Location: http://localhost/uspesneOdstranenyPojistenec.html");
      }
   }

if(array_key_exists('submit', $_POST)) {
    uprav();
}
if(array_key_exists('odstran', $_POST)) {
  odstran();
}
mysqli_close($link);
?>