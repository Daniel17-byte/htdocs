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
    <form method="post" action="shop.php" align="right">
    <input type="submit" name="con" value="Inapoi">
        </form>
    <h1>Date personale: </h1><br><br>
    <div><?php
    $dbServerName = "localhost";
    $dbUserName = "root";
    $dbPassword = "";
    $dbName = "eshop";
   
    $link = mysqli_connect($dbServerName ,$dbUserName ,$dbPassword ,$dbName);
    session_start();
    $var=$_SESSION['id'];
    $query = "SELECT * FROM Clienti Where id = $var ";

    if ($result = mysqli_query($link, $query))
    {
    while($row = mysqli_fetch_assoc($result))
    {     
        foreach($row as $key => $val)
        {
            if($key === 'nume'){
                ?><div style="font-size: 25px;"><br>Nume: <?php echo $val."  "; ?><br><form method="post" action="update.php"><input type="text" name="nume" placeholder="ex: Nicolae"><input type="submit" value="update"></form><?php
            }
            if($key === 'prenume'){
                ?><br>Prenume: <?php echo $val."  ";?><br><form method="post" action="update.php"><input type="text" name="prenume" placeholder="ex: Ana-Maria"><input type="submit" value="update"></form><?php
            }
            if($key === 'email'){
                ?><br>Email: <?php echo $val."  ";?><br><form method="post" action="update.php"><input type="email" name="email" placeholder="ex: ananicolae@yahoo.com"><input type="submit" value="update"></form><?php
            }
            if($key === 'parola'){
                ?><br>Parola: <?php echo $val."  ";?><br><form method="post" action="update.php"><input type="password" name="parola" placeholder="ex: ana123"><input type="submit" value="update"></form><?php
            }
            if($key === 'numar_card'){
                ?><br>Numar card: <?php echo $val."  ";?><br><form method="post" action="update.php"><input type="number" name="numar_card" placeholder="ex: 1616-1616" min="10000000" max="99999999"><input type="submit" value="update"></form><?php
            }
            if($key === 'data_nasterii'){
                ?><br>Data nasterii: <?php echo $val."  ";?><br><form method="post" action="update.php"><input type="datetime-local" name="data_nasterii" placeholder="ex: 04-16-2002"><input type="submit" value="update"></form></div><br><?php
            }
        }      
    }
    }?>
    </div>
    <h2>Sterge contul:</h2>
    <form method="post" action="delete.php">
    <input type="submit" name="delete" value="Sterge">
        </form>
    </body>
    <footer class="footer">
        &copy; 2022 E-SHOP designed by <a href="http://lungudaniel.com" target="_blank">LD</a>
    </footer>
</html>