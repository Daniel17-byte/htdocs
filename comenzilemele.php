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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    
  </body>
  <footer class="footer">
        &copy; 2022 E-SHOP designed by <a href="http://lungudaniel.com" target="_blank">LD</a>
    </footer>
</html>