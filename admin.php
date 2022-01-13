<?php
 $dbServerName = "localhost";
 $dbUserName = "root";
 $dbPassword = "";
 $dbName = "eshop";

 $link = mysqli_connect($dbServerName ,$dbUserName ,$dbPassword ,$dbName);

 session_start();
 if($_SESSION['email']!="lungud63@yahoo.com"){
    ?>
    <script type="text/javascript">
    window.location = "shop.php";
    </script>      
    <?php
 }
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Contul meu</title>
    <style>
      .footer {
    margin-top:5%;
    text-align:center;
    position: relative;
}
    </style>
  </head>
  <body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="shop.php">E-shop</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                    <form method="post" action="myaccount.php">
                    <button class="btn btn-outline-primary" name="con" type="submit">Contul meu</button>
                    </form>
                    </li>
                    <li class="nav-item" style="margin-left:10px;">
                    <form method="post" action="comenzilemele.php">
                    <button class="btn btn-outline-primary" name="con" type="submit">Comenzile mele</button>
                    </form>
                    </li>
                    <li class="nav-item" style="margin-left:10px;">
                    <form method="post" action="rapoarte.php">
                    <button class="btn btn-outline-primary" name="con" type="submit">Rapoarte</button>
                    </form>
                    </li>
                    <li class="nav-item" style="margin-left:10px;">
                    <form method="post" action="contact.php">
                    <button class="btn btn-outline-primary" name="con" type="submit">Contact</button>
                    </form>
                    </li>
                    <li class="nav-item" style="margin-left:10px;">
                    <form method="post" action="admin.php">
                    <button class="btn btn-outline-primary" name="con" type="submit">Admin</button>
                    </form>
                    </li>
                </ul>
                <form method="post" action="main.php" align="right">
                    <button class="btn btn-outline-danger" name="con" type="submit">Deconecteaza-te!</button>
                </form>
                </div>
            </div>
            </nav>

        <div style="margin-left: 50px;margin-right:300px;">
        <form action="produs.php" method="post">
            <div class="container">
                <h1>Adaugare produs</h1>
                <div class="mb-3">
                <label for="nume" class="form-label"><b>Nume Produs:</b></label>
                <input type="textarea" class="form-control" name="numeprodus" placeholder="ex: Camera Foto" required>
                </div>
                <div class="mb-3">
                <label for="valoareunitara" class="form-label"><b>Valoare Unitara:</b></label>
                <input type="textarea" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" class="form-control"  name="valoareunitara" placeholder=" ex: 500" required>
                </div>
                <div class="mb-3">
                <label for="stoc" class="form-label"><b>Stoc:</b></label>
                <input type="textarea" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" class="form-control"  name="stoc" placeholder=" ex: 25" required>
                </div>
                <div class="mb-3">
                <label for="vandute" class="form-label"><b>Vandute:</b></label>
                <input type="textarea" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" class="form-control"  name="vandute" placeholder=" ex: 10" required>
                </div>
                <div class="mb-3">
                <label for="vandute" class="form-label"><b>Garantie:</b></label>
                <input type="textarea" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" class="form-control"  name="garantie" min="0" max="5" placeholder=" ex: 5" required>
                </div>
                <button type="submit" name="adauga" class="btn btn-primary">Adauga!</button>
            </div>
        </form>
    </div>   

    <div style="margin-left: 50px;margin-right:300px; margin-top:50px;"> 
                          <form class="row g-3" method="post" action="produs.php">
                             <h1>Inlaturare produs</h1>
                            <div class="col-auto">
                                <label for="id_produs">ID PRODUS:</label>
                                <input type="textarea" name="id" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" placeholder="ex: produs 1">
                            </div>
                            <div class="col-auto">
                            <button type="submit" name="sterge" class="btn btn-outline-danger">Sterge!</button>
                            </div>
                            </form>
                      </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    
  </body>
  <footer class="footer">
        &copy; 2022 E-SHOP designed by <a href="http://lungudaniel.com" target="_blank">LD</a>
    </footer>
</html>