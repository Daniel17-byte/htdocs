<?php
 $dbServerName = "localhost";
 $dbUserName = "root";
 $dbPassword = "";
 $dbName = "eshop";

 $link = mysqli_connect($dbServerName ,$dbUserName ,$dbPassword ,$dbName);

 session_start();
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
    <form method="post" action="shop.php" align="right">
    <input type="submit" name="con" value="Inapoi">
        </form>
        <h1>Comenzile mele:</h1>
        <div><?php
    $var=$_SESSION['id'];
    $query = "SELECT * FROM Comenzi Where id_client = '$var';";

if ($result = mysqli_query($link, $query))
{
   while($row = mysqli_fetch_assoc($result))
   {     
       foreach($row as $key => $val)
       {
           if($key === 'id_comanda'){
           ?><div style="border-style: solid;"><br><h3>Id comanda: </h3><?php
           echo $val;
           ?><br><?php
           }
            if($key === 'data_comenzii'){
                ?><br><h3>Data comenzii: </h3><?php
                echo $val;
                ?></div><br><?php
                }
                }}}
                ?>
    </body>
    <footer class="footer">
        &copy; 2022 E-SHOP designed by <a href="http://lungudaniel.com" target="_blank">LD</a>
    </footer>
</html>