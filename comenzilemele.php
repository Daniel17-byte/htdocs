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

    <title>Comenzile mele</title>
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
 
        <h1>Comenzile mele:</h1>
        <div><?php
    $var=$_SESSION['id'];
    $var2;
    $var3;
    $var4;
    $query = "SELECT * FROM Comenzi Where id_client = '$var';";
if ($result = mysqli_query($link, $query))
{
    $nr = 1;
   while($row = mysqli_fetch_assoc($result))
   {  ?>  <div class="card" style="margin: 20px 100px 20px 100px;">
    <div class="card-header">
   Comanda #<?php
   echo $nr;
       foreach($row as $key => $val)
       {
        if($key === 'id_comanda'){
            ?>
            </div>
                 <div class="card-body">
            <p class="card-text">Nume: <?php
            echo $_SESSION['nume'];
            ?></p><?php
            }
            if($key === 'id_comanda'){
                ?>
                <p class="card-text">Prenume: <?php
                echo $_SESSION['prenume'];
                ?></p><?php
                }
           if($key === 'id_comanda'){
           ?>
           <p class="card-text">Numarul comenzii: <?php
           echo $val;
           $var2 = $val;
           ?></p><?php
           }

            if($key === 'data_comenzii'){
                ?><p class="card-text">Data comenzii: <?php
                echo $val;
                ?></p>
                <?php
                    $qry = "SELECT * FROM Cos_comanda Where id_comanda = '$var2' LIMIT 1; ";
                    if ($result2 = mysqli_query($link, $qry))
                    {
                        while($row2 = mysqli_fetch_assoc($result2))
                        {
                            foreach($row2 as $key => $val)
                            {
                                if($key === 'id_produs'){
                                    ?>
                                    <p class="card-text">Id Produs: <?php
                                    echo $val;
                                    $var3=$val;
                                    ?></p><?php
                                    }
                                    if($key === 'cantitate'){
                                        ?>
                                        <p class="card-text">Cantitate: <?php
                                        echo $val;
                                        $var4=$val;
                                        ?></p><?php
                                        }
                            }
                        }
                    }
                    $qry3 = "SELECT * FROM Produse Where id_produs = '$var3' LIMIT 1; ";
                    if ($result3 = mysqli_query($link, $qry3))
                    {
                        while($row3 = mysqli_fetch_assoc($result3))
                        {
                            foreach($row3 as $key => $val)
                            {
                                if($key === 'valoare_unitara'){
                                    ?>
                                    <p class="card-text">Valoarea Totala: <?php
                                    echo $val*$var4;
                                    ?></p><?php
                                    }
                            }
                        }
                    }
                ?>
                </div>
                </div><?php
                }
                }
                $nr++;}}
                ?>
                </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
                        
  </body>
  <footer class="footer">
        &copy; 2022 E-SHOP designed by <a href="http://lungudaniel.com" target="_blank">LD</a>
    </footer>
</html>