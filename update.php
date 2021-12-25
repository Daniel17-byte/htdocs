<?php
$dbServerName = "localhost";
$dbUserName = "root";
$dbPassword = "";
$dbName = "eshop";

$link = mysqli_connect($dbServerName ,$dbUserName ,$dbPassword ,$dbName);
session_start();
if(isset($_POST['nume'])){
    $var1=$_SESSION['id'];
    $var2=$_POST['nume'];
    $query = "UPDATE Clienti SET nume = '$var2' WHERE id = $var1;";
    mysqli_query($link, $query);
    $_SESSION['nume']=$var2;
}

if(isset($_POST['prenume'])){
    $var1=$_SESSION['id'];
    $var2=$_POST['prenume'];
    $query = "UPDATE Clienti SET prenume = '$var2' WHERE id = $var1;";
    mysqli_query($link, $query);
    $_SESSION['prenume']=$var2;
}

if(isset($_POST['email'])){
    $var1=$_SESSION['id'];
    $var2=$_POST['email'];
    $query = "UPDATE Clienti SET email = '$var2' WHERE id = $var1;";
    mysqli_query($link, $query);
    $_SESSION['email']=$var2;
}

if(isset($_POST['parola'])){
    $var1=$_SESSION['id'];
    $var2=$_POST['parola'];
    $query = "UPDATE Clienti SET parola = '$var2' WHERE id = $var1;";
    mysqli_query($link, $query);
    $_SESSION['parola']=$var2;
}
if(isset($_POST['numar_card'])){
    $var1=$_SESSION['id'];
    $var2=$_POST['numar_card'];
    $query = "SELECT * FROM Clienti WHERE numar_card = $var2;";
    $result=mysqli_query($link, $query);
    $user=mysqli_fetch_assoc($result);
        if(!$user){
        
                $query = "UPDATE Clienti SET numar_card = '$var2' WHERE id = $var1;";
                mysqli_query($link, $query);
                $_SESSION['numar_card']=$var2;
        }
}
if(isset($_POST['data_nasterii'])){
    $var1=$_SESSION['id'];
    $var2=$_POST['data_nasterii'];
    $query = "UPDATE Clienti SET data_nasterii = '$var2' WHERE id = $var1;";
    mysqli_query($link, $query);
    $_SESSION['data_nasterii']=$var2;
}
?>
                  <script type="text/javascript">
                  window.location = "myaccount.php";
                  </script>      
                  <?php
?>