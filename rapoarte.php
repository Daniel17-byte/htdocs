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

    <title>Rapoarte</title>
    <style>
      .footer {
    margin-top:5%;
    text-align:center;
    position: relative;
}
    .borders{
        border:solid gray;
        margin: 50px 50px 50px 50px;
        border-radius: 15px;
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
 
        <h1>Rapoarte:</h1><br>
       <div class="borders">
                    <p style="margin-left:15px;">Produse vandute inca in garantie:</p>

                    <?php
                        $nr=1;
                            $qry = "SELECT nume_produs,garantie FROM Produse Where vandute > 0 AND garantie > 0 ; ";
                                        if ($result2 = mysqli_query($link, $qry))
                                        {
                                            while($row2 = mysqli_fetch_assoc($result2))
                                            {
                                                ?>  <div class="card" style="margin: 20px 100px 20px 100px;">
                                                <div class="card-header">
                                            Produs vandut #<?php echo $nr;?></div><?php
                                                foreach($row2 as $key => $val)
                                                {
                                                    if($key === 'nume_produs'){
                                                        ?>
                                                        <p class="card-text">Nume Produs: <?php
                                                        echo $val;
                                                        ?></p><?php
                                                        }
                                                        if($key === 'garantie'){
                                                            ?>
                                                            <p class="card-text">Data Expirarii: <?php
                                                            echo $val;
                                                            ?></p></div><?php
                                                            }
                                                }
                                                $nr++;
                                            }
                                            ?></div><?php 
                                        }     
                            
                    ?>
        </div>
        
        <div class="borders">
        <p style="margin-left:15px;">Cel mai vandut produs: </p>
        <?php
                            $qry2 = "SELECT nume_produs,vandute FROM Produse GROUP BY nume_produs ORDER BY vandute DESC LIMIT 1;";
                                        if ($result3 = mysqli_query($link, $qry2))
                                        {
                                            while($row3 = mysqli_fetch_assoc($result3))
                                            {
                                                ?>  <div class="card" style="margin: 20px 100px 20px 100px;">
                                                <?php
                                                foreach($row3 as $key => $val)
                                                {
                                                    if($key === 'nume_produs'){
                                                        ?>
                                                        <p class="card-text">Nume Produs: <?php
                                                        echo $val;
                                                        ?></p><?php
                                                        }
                                                        if($key === 'vandute'){
                                                            ?>
                                                            <p class="card-text">Cantitate: <?php
                                                            echo $val;
                                                            ?></p></div><?php
                                                            }
                                                }
                                            }
                                            ?></div><?php 
                                        }     
                            
                    ?>
        </div>
        
        <div class="borders">
        <p style="margin-left:15px;">Cele mai multe vanzari au avut loc in data de:</p>
        <?php
                            $qry3 = "SELECT  data_comanda, sum(cantitate) Cantitate
                            FROM Cos_comanda  
                            GROUP by data_comanda
                            ORDER BY Cantitate desc
                            LIMIT 1;";
                                        if ($result4 = mysqli_query($link, $qry3))
                                        {
                                            while($row4 = mysqli_fetch_assoc($result4))
                                            {
                                                ?>  <div class="card" style="margin: 20px 100px 20px 100px;">
                                                <?php
                                                foreach($row4 as $key => $val)
                                                {
                                                    if($key === 'data_comanda'){
                                                        ?>
                                                        <p class="card-text">Data Comanda: <?php
                                                        echo $val;
                                                        ?></p></div><?php
                                                        }
                                                }
                                            }
                                            ?></div><?php 
                                        }     
                            
                    ?>
        </div>
        
        <div class="borders">
        <p style="margin-left:15px;">Cel mai fidel client:</p>
        <?php
                            $qry4 = "SELECT nume, prenume, SUM(p.valoare_unitara * ol.cantitate) as totalPurchases FROM Clienti c
                            LEFT JOIN Comenzi o ON o.id_client = c.id
                            LEFT JOIN Cos_comanda ol ON ol.id_comanda = o.id_comanda
                            LEFT JOIN Produse p ON p.id_produs = ol.id_produs
                            GROUP BY c.id
                            ORDER BY totalPurchases DESC
                            LIMIT 1;";
                                        if ($result5 = mysqli_query($link, $qry4))
                                        {
                                            while($row5 = mysqli_fetch_assoc($result5))
                                            {
                                                ?>  <div class="card" style="margin: 20px 100px 20px 100px;">
                                                <?php
                                                foreach($row5 as $key => $val)
                                                {
                                                    if($key === 'nume'){
                                                        ?>
                                                        <p class="card-text">Nume: <?php
                                                        echo $val;
                                                        ?></p><?php
                                                        }
                                                        if($key === 'prenume'){
                                                            ?>
                                                            <p class="card-text">Prenume: <?php
                                                            echo $val;
                                                            ?></p></div><?php
                                                            }
                                                }
                                            }
                                            ?></div><?php 
                                        }     
                            
                    ?>
        </div>
        
        
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
                        
  </body>
  <footer class="footer">
        &copy; 2022 E-SHOP designed by <a href="http://lungudaniel.com" target="_blank">LD</a>
    </footer>
</html>