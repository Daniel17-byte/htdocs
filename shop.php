<?php
 $dbServerName = "localhost";
 $dbUserName = "root";
 $dbPassword = "";
 $dbName = "eshop";

 $link = mysqli_connect($dbServerName ,$dbUserName ,$dbPassword ,$dbName);

    session_start();
    echo "Hi ".$_SESSION['nume'];
  
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
        <form method="post" action="main.php" align="right" style="margin-bottom:10px;">
    <input type="submit" name="con" value="Deconecteaza-te!">
        </form>
    </body>
    <footer class="footer">
        &copy; 2022 E-SHOP designed by <a href="http://lungudaniel.com" target="_blank">LD</a>
    </footer>
</html>