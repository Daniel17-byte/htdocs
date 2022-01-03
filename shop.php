<?php
 $dbServerName = "localhost";
 $dbUserName = "root";
 $dbPassword = "";
 $dbName = "eshop";

 $link = mysqli_connect($dbServerName ,$dbUserName ,$dbPassword ,$dbName);

    session_start();
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Shop</title>
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
                </ul>
                <form method="post" action="main.php" align="right">
                    <button class="btn btn-outline-danger" name="con" type="submit">Deconecteaza-te!</button>
                </form>
                </div>
            </div>
            </nav>

    <div><h1>Produse:</h1><?php
    $query = "SELECT * FROM Produse ";

if ($result = mysqli_query($link, $query))
{
   while($row = mysqli_fetch_assoc($result))
   {     ?><div class="card" style="margin: 20px 100px 20px 100px;">
    <div class="card-header"><?php
       foreach($row as $key => $val)
       {
           if($key === 'id_produs'){
           echo $val;
           ?></div>
           <div class="card-body"><?php
           }
           if($key === 'nume_produs'){
            ?><h5 class="card-title"><?php
            echo $val;
            ?></h5><?php
            }
            if($key === 'stoc'){
                ?><p class="card-text">Stoc: <?php
                echo $val;
                ?></p><?php
                }
                if($key === 'vandute'){
                    ?><p class="card-text">Vandute: <?php
                    echo $val;
                    ?></p><?php
                    }
                if($key === 'valoare_unitara'){
                    ?><p class="card-text">Pret: <?php
                    echo $val;
                    ?></p><?php
                    }
                    if($key === 'garantie'){
                        ?><p class="card-text">Garantie: <?php
                        echo $val;
                        ?></p></div></div><?php
                        }
       }      
   }
}?>
                      <div style="margin: 50px 20px 50px 20px;"> 
                          <form class="row g-3" method="post" action="comanda.php">
                             <h2>Comanda aici!</h2>
                            <div class="col-auto">
                                <label for="id_produs">ID PRODUS:</label>
                                <input type="textarea" name="id" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" placeholder="ex: produs 1">
                            </div>
                            <div class="col-auto">
                                <label for="cantitate">Cantitate:</label>
                                <input type="textarea" name="cantitate" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" placeholder="ex: 2 bucati">
                            </div>
                            <div class="col-auto">
                            <button type="submit" name="comanda" class="btn btn-outline-success">Comanda!</button>
                            </div>
                            </form>
                      </div>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    
  </body>
  <footer class="footer">
        &copy; 2022 E-SHOP designed by <a href="http://lungudaniel.com" target="_blank">LD</a>
    </footer>
</html>