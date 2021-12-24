<?php

    $dbServerName = "localhost";
    $dbUserName = "root";
    $dbPassword = "";
    $dbName = "eshop";

    $link = mysqli_connect($dbServerName ,$dbUserName ,$dbPassword ,$dbName);
   
    $aux = 0;

    if(isset($_POST['con'])){//login
      $query = "SELECT * FROM Clienti";
      if($result = mysqli_query($link,$query)){
        while($row = mysqli_fetch_array($result)){
            if($_POST['email']==$row['email']&&$_POST['parola']==$row['parola']){
            session_start();
            $_SESSION['id']=$row['id'];
            $_SESSION['nume']=$row['nume'];
            $_SESSION['prenume']=$row['prenume'];
            $_SESSION['email']=$row['email'];
            $_SESSION['parola']=$row['parola'];
            $_SESSION['numar_card']=$row['numar_card'];
            $_SESSION['data_nasterii']=$row['data_nasterii'];
            $aux = 1;
            ?>
             <script type="text/javascript">
             window.location = "shop.php";
             </script>      
             <?php
            }
          }
          if($aux == 0)
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
      if($_POST['nume']&&$_POST['prenume']&&$_POST['email']&&$_POST['parola']&&$_POST['numar_card']&&$_POST['data_nasterii']){        
            $var1=$_POST['nume'];
            $var2=$_POST['prenume'];
            $var3=$_POST['email'];
            $var4=$_POST['parola'];
            $var5=$_POST['numar_card'];
            $var6=$_POST['data_nasterii'];
            $query = "SELECT * FROM Clienti WHERE numar_card = '$var5' Limit 1";
            $result = mysqli_query($link, $query);
            $user = mysqli_fetch_assoc($result);
                if ($user) {
                if ($user['numar_card'] === $var5) {
                  ?>
                  <script type="text/javascript">
                  window.location = "registration.php";
                  </script>      
                  <?php
                }
              }
              $query = "SELECT * FROM Clienti WHERE email= '$var3' Limit 1";
            $result = mysqli_query($link, $query);
            $user = mysqli_fetch_assoc($result);
                if ($user) {
                if ($user['email'] === $var3) {
                  ?>
                  <script type="text/javascript">
                  window.location = "registration.php";
                  </script>      
                  <?php
                }
              }
            $query = "INSERT INTO Clienti (nume , prenume , email , parola , numar_card, data_nasterii) 
                  VALUES('$var1','$var2','$var3','$var4','$var5','$var6')";
            mysqli_query($link, $query);
              $aux = 2;
              if($aux == 2){
              ?>
             <script type="text/javascript">
             window.location = "login.php";
             </script>      
             <?php
              }else{
                ?>
             <script type="text/javascript">
             window.location = "registration.php";
             </script>      
             <?php
              }
        }
    }


// Check connection
if ($link -> connect_errno) {
  echo "Failed to connect to MySQL: " . $link -> connect_error;
  exit();
}
?>