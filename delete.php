<?php
$dbServerName = "localhost";
$dbUserName = "root";
$dbPassword = "";
$dbName = "eshop";

$link = mysqli_connect($dbServerName ,$dbUserName ,$dbPassword ,$dbName);

if(isset($_POST['delete'])){
    session_start();
    $var = $_SESSION['id'];
    $query = "SET FOREIGN_KEY_CHECKS = 0;";
    $result = mysqli_query($link, $query);
    $query = "DELETE FROM Clienti Where id = $var;";
    $result = mysqli_query($link, $query);
    echo $var;
    if($result){
        session_destroy();
        ?>
                  <script type="text/javascript">
                  window.location = "main.php";
                  </script>      
        <?php
    }else{
        ?>
                  <script type="text/javascript">
                  window.location = "shop.php";
                  </script>      
        <?php
    }
}
        ?>
                  <script type="text/javascript">
                  window.location = "shop.php";
                  </script>      
        <?php
?>