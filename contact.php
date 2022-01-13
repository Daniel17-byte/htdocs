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
         <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="shop.php">E-shop</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                    <form method="post" action="myaccount.php">
                    <button class="btn btn-outline-primary" name="con" type="submit">Contul meu</button>
                    </form>
                    </li>
                    <li class="nav-item" style="margin-left:10px;">
                    <form method="post" action="comenzilemele.php">
                    <button class="btn btn-outline-primary" name="con" type="submit">Comenzile mele</button>
                    </form>
                    </li>
                    <li class="nav-item" style="margin-left:10px;">
                    <form method="post" action="rapoarte.php">
                    <button class="btn btn-outline-primary" name="con" type="submit">Rapoarte</button>
                    </form>
                    </li>
                    <li class="nav-item" style="margin-left:10px;">
                    <form method="post" action="contact.php">
                    <button class="btn btn-outline-primary" name="con" type="submit">Contact</button>
                    </form>
                    </li>
                    <li class="nav-item" style="margin-left:10px;">
                    <form method="post" action="admin.php">
                    <button class="btn btn-outline-primary" name="con" type="submit">Admin</button>
                    </form>
                    </li>
                </ul>
                <form method="post" action="main.php" align="right">
                    <button class="btn btn-outline-danger" name="con" type="submit">Deconecteaza-te!</button>
                </form>
                </div>
            </div>
            </nav>
 
        <h1>Contact:</h1>
        <br><br>
        <div style="margin-left:25%; margin-right:25%; margin-top:100px;">
        <h3>Trimite un email!</h3>
                <form action="mailto:noreply@eshop.com" method="post">
                    <div class="form-group mt-3">
                    <input type="text" class="form-control" name="message" id="message" placeholder="Mesaj" required>
                    </div>
                    <div class="text-center" style="margin-top:30px;">
                    <button type="submit" class="btn btn-success" name="mail" onclick="fun()">Trimite</button>
                    </div>
                    <script>
                function fun() {
                  setTimeout(
                    function () {
                  document.getElementById('subject').value = '';
                  document.getElementById('message').value = '';
                    }, 1000);
                }
              </script>
                    </form> 
        <div>
        
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
                        
  </body>
  <footer class="footer" style="margin-top:200px;">
        &copy; 2022 E-SHOP designed by <a href="http://lungudaniel.com" target="_blank">LD</a>
    </footer>
</html>