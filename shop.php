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
<!DOCTYPE html>
<html>
    <head>
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
    </body>
    <footer class="footer">
        &copy; 2022 E-SHOP designed by <a href="http://lungudaniel.com" target="_blank">LD</a>
    </footer>
</html>