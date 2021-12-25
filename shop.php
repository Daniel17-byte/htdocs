<?php
 $dbServerName = "localhost";
 $dbUserName = "root";
 $dbPassword = "";
 $dbName = "eshop";

 $link = mysqli_connect($dbServerName ,$dbUserName ,$dbPassword ,$dbName);

    session_start();
    ?>
    <h1><?php echo "Hi ".$_SESSION['nume'];?></h1>
    <?php
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
  <form method="post" action="myaccount.php" align="right">
    <input type="submit" name="con" value="Contul meu">
        </form>
        <form method="post" action="comenzilemele.php" align="right">
    <input type="submit" name="con" value="Comenzile mele">
        </form>
        <form method="post" action="main.php" align="right" style="margin-bottom:10px;">
    <input type="submit" name="con" value="Deconecteaza-te!">
        </form>

    <div><?php
    $query = "SELECT * FROM Produse ";

if ($result = mysqli_query($link, $query))
{
   while($row = mysqli_fetch_assoc($result))
   {     
       foreach($row as $key => $val)
       {
           if($key === 'id_produs'){
           ?><div style="border-style: solid;"><br><h3>ID produs</h3><?php
           echo $val;
           ?><br><?php
           }
           if($key === 'nume_produs'){
            ?><br><h3>Nume produs:</h3><?php
            echo $val;
            ?><br><?php
            }
            if($key === 'stoc'){
                ?><br><h3>Stoc:</h3><?php
                echo $val;
                ?><br><?php
                }
                if($key === 'valoare_unitara'){
                    ?><br><h3>Pret:</h3><?php
                    echo $val;
                    ?><br><?php
                    }
                    if($key === 'garantie'){
                        ?><br><h3>Garantie:</h3><?php
                        echo $val;
                        ?><br></div><br><?php
                        }
       }      
   }
}?>
        <br><br>
        <h2>Comanda aici!</h2>
        <form method="post" action="comanda.php">
        ID PRODUS:<input type="number" name="id" value="id"><br><br>
        CANTITATE:<input type="number" name="cantitate" value="cantitate"><br><br>
            <input type="submit" name="comanda" value="Comanda!">
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    
  </body>
  <footer class="footer">
        &copy; 2022 E-SHOP designed by <a href="http://lungudaniel.com" target="_blank">LD</a>
    </footer>
</html>