<?php

    $dbServerName = "localhost";
    $dbUserName = "root";
    $dbPassword = "";
    $dbName = "eshop";

    $link = mysqli_connect($dbServerName ,$dbUserName ,$dbPassword ,$dbName);
   
    $aux = 0;

    if(isset($_POST['con'])){//login
      $query = "SELECT * FROM Persoana";
      if($result = mysqli_query($link,$query)){
        while($row = mysqli_fetch_array($result)){
            if($_POST['nume']==$row['Nume']&&$_POST['prenume']==$row['Prenume']){
            session_start();
            $_SESSION['nume']=$row['Nume'];
            $_SESSION['prenume']=$row['Prenume'];
            $_SESSION['dataNasterii']=$row['DataNasterii'];
            $_SESSION['numarCard']=$row['NumarCard'];
            $aux = 1;
            ?>
             <script type="text/javascript">
             window.location = "shop.php";
             </script>      
             <?php
            }
          }
          if(aux == 0)
          {
            ?>
             <script type="text/javascript">
             window.location = "login.php";
             </script>      
             <?php
          }
        }
    }
    if (isset($_POST['create'])){//register
      if($_POST['nume']&&$_POST['prenume']&&$_POST['dataNasterii']&&$_POST['numarCard']){        
            $var1=$_POST['nume'];
            $var2=$_POST['prenume'];
            $var3=$_POST['dataNasterii'];
            $var4=$_POST['numarCard'];
            $ok = 0;
            $query = "SELECT * FROM Persoana WHERE NumarCard = '$var4' Limit 1";
            $result = mysqli_query($link, $query);
            $user = mysqli_fetch_assoc($result);
                if ($user) {
                if ($user['NumarCard'] === $var4) {
                    $ok = 1;
                }
              }
            $query = "INSERT INTO Persoana (NumarCard,Nume,Prenume,DataNasterii) 
                  VALUES('$var4','$var1','$var2','$var3')";
            mysqli_query($link, $query);
            session_start();
              $_SESSION['nume']=$var1;
              $_SESSION['prenume']=$var2;
              $_SESSION['dataNasterii']=$var3;
              $_SESSION['numarCard']=$var4;
              $aux = 2;
              if($aux != 0 && $ok == 0){
              ?>
             <script type="text/javascript">
             window.location = "shop.php";
             </script>      
             <?php
              }
        }
          if($aux == 0 || $ok !=0)
        {
            ?>
             <script type="text/javascript">
             window.location = "registration.php";
             </script>      
             <?php
    }
    }


// Check connection
if ($link -> connect_errno) {
  echo "Failed to connect to MySQL: " . $link -> connect_error;
  exit();
}
?>
<!DOCTYPE html>
<html>
  <head>

  </head>
  <body>
  <div>
        <?php
        if(isset($_POST['create']))
            echo "Welcome ".$_POST['nume']." !";
        elseif (isset($_POST['con']))
            echo "Hi ".$_POST['nume']." !";
        ?>
    </div>
  </body>
</html>