<?php
 $dbServerName = "localhost";
 $dbUserName = "root";
 $dbPassword = "";
 $dbName = "eshop";

 $link = mysqli_connect($dbServerName ,$dbUserName ,$dbPassword ,$dbName);
 session_start();
    if(isset($_POST['comanda'])){
        if(isset($_POST['id'])&&isset($_POST['cantitate'])){
            $query="SELECT count(*) as total from Comenzi";
            $result=mysqli_query($link,$query);
            $data=mysqli_fetch_assoc($result);
            $idComanda = $data['total'] + 1;
            $idClient = $_SESSION['id'];
            $data = date("Y-m-d");
            $idProdus = $_POST['id'];
            $cantitate = $_POST['cantitate'];
            $result1 = mysqli_query($link, "Call VanzareProd($idComanda, $idClient, '$data', $cantitate, $idProdus);");
                  ?>
                  <script type="text/javascript">
                  window.location = "shop.php";
                  </script>      
                  <?php
        }
    }
?>