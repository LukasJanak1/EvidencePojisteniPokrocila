
<?php
$link = mysqli_connect("localhost", "root", "", "databaze_pojistencu");

if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
$pojisteniId = mysqli_real_escape_string($link, $_REQUEST['pojisteniId']);


$query = "SELECT * FROM pojisteni WHERE pojisteniId LIKE '$pojisteniId'";
$result = mysqli_query($link,$query);
if (!$result) {
  header("Location: http://localhost/neuspesneVyhledani.html");
}
$row = mysqli_fetch_row($result);
mysqli_close($link);
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous" />
    <title><?php echo $row[0]; ?>  <?php echo $row[2]; ?></title>
    </head>
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
        <form class="form-horizontal" method="post" action="upravPojisteni.php">
            <h1 class="h3 mb-3 font-weight-normal">Vyhledané pojištění</h1>

            <label for="pojisteniId" class="sr-only">ID pojištění</label>
            <input type="text" id="pojisteniId" class="form-control"  name="pojisteniId" value="<?php echo $row[0]; ?>" >

            <label for="pojistenecId" class="sr-only">ID pojištěnce</label>
            <input type="text" id="pojistenecId" class="form-control"  name="pojistenecId" value="<?php echo $row[1]; ?>" >
            
            <label for="nazev" class="sr-only">Název</label>
            <input type="text" id="nazev" class="form-control"  name="nazev" value="<?php echo $row[2]; ?>">

            <label for="castka" class="sr-only">Částka</label>
            <input type="text" id="castka" class="form-control"  name="castka" value="<?php echo $row[3]; ?>">

            <label for="predmetPojisteni" class="sr-only">Předmět pojištění</label>
            <input type="text" id="predmetPojisteni" class="form-control"  name="predmetPojisteni" value="<?php echo $row[4]; ?>">
            
            <label for="od" class="sr-only">Datum od:</label>
            <input type="text" id="od" class="form-control"  name="od" value="<?php echo $row[5]; ?>">

            <label for="do" class="sr-only">Datum do:</label>
            <input type="text" id="do" class="form-control"  name="do" value="<?php echo $row[6]; ?>">

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
 
</body>
</html>