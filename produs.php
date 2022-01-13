<?php

$dbServerName = "localhost";
$dbUserName = "root";
$dbPassword = "";
$dbName = "eshop";

$link = mysqli_connect($dbServerName ,$dbUserName ,$dbPassword ,$dbName);

if (isset($_POST['adauga'])){//register
    if($_POST['numeprodus']&&$_POST['valoareunitara']&&$_POST['stoc']&&$_POST['vandute']&&$_POST['garantie']){        
          $var1=$_POST['numeprodus'];
          $var2=$_POST['valoareunitara'];
          $var3=$_POST['stoc'];
          $var4=$_POST['vandute'];
          $var5=$_POST['garantie'];
          $query = "INSERT INTO Produse (nume_produs, valoare_unitara , stoc , vandute ,garantie) VALUES
          ('$var1', '$var2', '$var3', '$var4', '$var5')";
          $result = mysqli_query($link, $query);
          ?>
    <script type="text/javascript">
    window.location = "admin.php";
    </script>      
    <?php
      }
  }
  if (isset($_POST['sterge'])){//register
    if($_POST['id']){        
          $var1=$_POST['id'];
          $query = "DELETE FROM Produse WHERE id_produs = $var1";
          $result = mysqli_query($link, $query);
          
          ?>
    <script type="text/javascript">
    window.location = "admin.php";
    </script>      
    <?php
      }
  }
?>