
<?php

function uprav() {
$link = mysqli_connect("localhost", "root", "", "databaze_pojistencu");
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
$pojisteniId = mysqli_real_escape_string($link, $_REQUEST['pojisteniId']);
$nazev = mysqli_real_escape_string($link, $_REQUEST['nazev']);
$castka = mysqli_real_escape_string($link, $_REQUEST['castka']);
$predmetPojisteni = mysqli_real_escape_string($link, $_REQUEST['predmetPojisteni']);
$od = mysqli_real_escape_string($link, $_REQUEST['od']);
$do = mysqli_real_escape_string($link, $_REQUEST['do']);
  $query = "UPDATE pojisteni SET nazev ='$nazev', castka = '$castka',predmetPojisteni = '$predmetPojisteni', od = '$od',do = '$do'
  WHERE pojisteniId LIKE '$pojisteniId'";
  $result = mysqli_query($link,$query);
  if (!$result) {
    header("Location: http://localhost/neuspesnaZmenaPojisteni.html");
  }else{
    header("Location:http://localhost/uspesnaZmenaPojisteni.html");
    }
 }

 function odstran() {
  $link = mysqli_connect("localhost", "root", "", "databaze_pojistencu");
  if($link === false){
      die("ERROR: Could not connect. " . mysqli_connect_error());
  }
  $pojisteniId = mysqli_real_escape_string($link, $_REQUEST['pojisteniId']);
  
  
    $query = "DELETE FROM pojisteni WHERE pojisteniId LIKE '$pojisteniId'";
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