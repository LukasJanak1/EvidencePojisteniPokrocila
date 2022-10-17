
<?php
$link = mysqli_connect("localhost", "root", "", "databaze_pojistencu");

if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
$jmeno = mysqli_real_escape_string($link, $_REQUEST['jmeno']);
$prijmeni = mysqli_real_escape_string($link, $_REQUEST['prijmeni']);

$query = "SELECT pojistenecId,jmeno,prijmeni,ulice,mesto,psc,email,telefon FROM pojistenci WHERE jmeno LIKE '$jmeno' AND prijmeni LIKE '$prijmeni'";
$result = mysqli_query($link,$query);
if (!$result) {
  header("Location: http://localhost/neuspesneVyhledani.html");
}
$row = mysqli_fetch_row($result);
function uprav() {
  $query = "UPDATE pojistenci SET jmeno ='$jmeno', prijmeni = '$prijmeni',ulice = '$ulice',mesto = '$mesto',psc = '$psc',email = '$email',telefon = '$telefon' 
  WHERE jmeno LIKE '$jmeno' AND prijmeni LIKE '$prijmeni'";
  }
mysqli_close($link);
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous" />
    <title><?php echo $row[0]; ?> <?php echo $row[1]; ?> <?php echo $row[2]; ?></title>
    <body style="margin: 20px;">
    <header>
        <nav class="navbar navbar-expand navbar-dark bg-dark" aria-label="Second navbar example">
          <div class="container-fluid">
            <a class="navbar-brand" href="index.html">Hlavní menu</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample02" aria-controls="navbarsExample02" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
      
            <div class="collapse navbar-collapse" id="navbarsExample02">
      
              <ul class="navbar-nav me-auto">
                <li class="nav-item">
                  <a class="nav-link" aria-current="page" href="pridejPojistence.html">Přidej pojištěnce</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="vyhledejPojistence.html">Vyhledej pojištěnce</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="pridejPojisteni.html">Přidej pojištění</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="vyhledejPojisteni.html">Vyhledej pojištění</a>
                </li>
              </ul>
            </div>
          </div>
        </nav>
    </header>
          <main>
        <form class="form-horizontal" method="post" action="upravPojistence.php">
            <h1 class="h3 mb-3 font-weight-normal">Vyhledaný pojištěnec</h1>

            <label for="pojistenecId" class="sr-only">ID</label>
            <input type="text" id="pojistenecId" class="form-control"  name="pojistenecId" value="<?php echo $row[0]; ?>" >

            <label for="jmeno" class="sr-only">Jméno</label>
            <input type="text" id="jmeno" class="form-control"  name="jmeno" value="<?php echo $row[1]; ?>" >
            
            <label for="prijmeni" class="sr-only">Přijmení</label>
            <input type="text" id="prijmeni" class="form-control"  name="prijmeni" value="<?php echo $row[2]; ?>">

            <label for="ulice" class="sr-only">Ulice</label>
            <input type="text" id="ulice" class="form-control"  name="ulice" value="<?php echo $row[3]; ?>">

            <label for="mesto" class="sr-only">Město</label>
            <input type="text" id="mesto" class="form-control"  name="mesto" value="<?php echo $row[4]; ?>">
            
            <label for="psc" class="sr-only">PSČ</label>
            <input type="text" id="psc" class="form-control"  name="psc" value="<?php echo $row[5]; ?>">

            <label for="email" class="sr-only">Email</label>
            <input type="email" id="email" class="form-control"  name="email" value="<?php echo $row[6]; ?>">

            <label for="telefon" class="sr-only">Telefon</label>
            <input type="text" id="telefon" class="form-control" name="telefon" value="<?php echo $row[7]; ?>">
            <h2>Seznam pojištění:</h2>
            <table class="table">
              <thead>
                <tr>
                  <th>ID pojištění</th>
                  <th>Název</th>
                  <th>Částka</th>
                  <th>Předmět pojistky</th>
                  <th>Datum od</th>
                  <th>Datum do</th>
                </tr>
              </thead>
              <tbody>
                <?php
                    $link = mysqli_connect("localhost", "root", "", "databaze_pojistencu");
                    if($link === false){
                      die("ERROR: Could not connect. " . mysqli_connect_error());
                  }
                  
                  $sql = "SELECT * FROM pojisteni WHERE pojistenecId = $row[0]";
                  $resultPojisteni = mysqli_query($link,$sql);
                  if (!$resultPojisteni) {
                    echo "Nenalezeny žádné pojištění";
                  }
                  while ($rowPojisteni = mysqli_fetch_row($resultPojisteni)) {
                    echo "
                          <tr>
                          <td>" . $rowPojisteni[1] . "</td>
                          <td>" . $rowPojisteni[2] . "</td>
                          <td>" . $rowPojisteni[3] . "</td>
                          <td>" . $rowPojisteni[4] . "</td>
                          <td>" . $rowPojisteni[5] . "</td>
                          <td>" . $rowPojisteni[6] . "</td>
                          </tr>";
                  }
                ?>
              </tbody>
            </table>

            <input type="submit" class="btn btn-lg btn-success" name ="submit"  value="Uprav">
            <button class="btn btn-lg btn-success btn-warning" type="reset">Reset</button>
            <input type="submit" class="btn btn-lg btn-danger" name ="odstran"  value="Odstraň">
          </form>
        </main>

        <div class="container">
            <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
              <p class="col-md-4 mb-0 text-muted">&copy; Lukáš Janák, ITnetwork projekt, 2022</p>
          
              <a href="/" class="col-md-4 d-flex align-items-center justify-content-center mb-3 mb-md-0 me-md-auto link-dark text-decoration-none">
                <svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"/></svg>
              </a>
    
            </footer>
          </div>
</head>
</body>
</html>