<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Contul meu</title>
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
                </ul>
                <form method="post" action="main.php" align="right">
                    <button class="btn btn-outline-danger" name="con" type="submit">Deconecteaza-te!</button>
                </form>
                </div>
            </div>
            </nav>

    <h1>Date personale: </h1><br><br>
    <div><?php
    $dbServerName = "localhost";
    $dbUserName = "root";
    $dbPassword = "";
    $dbName = "eshop";
   
    $link = mysqli_connect($dbServerName ,$dbUserName ,$dbPassword ,$dbName);
    session_start();
    $var=$_SESSION['id'];
    $query = "SELECT * FROM Clienti Where id = $var ";

    if ($result = mysqli_query($link, $query))
    {
    while($row = mysqli_fetch_assoc($result))
    {     
        foreach($row as $key => $val)
        {
            if($key === 'nume'){
                ?><div style="font-size: 25px;">
                <div class="mb-3" style="margin-left: 10px;margin-right: 300px;">
                <label for="nume" class="form-label"><b>Nume:</b></label>
                <?php echo $val."  "; ?>
                <form method="post" action="update.php"><input type="textarea" class="form-control" name="nume" placeholder="ex: Nicolae" required>
                <button type="submit" class="btn btn-outline-warning">Update</button></form></div><?php
            }
            if($key === 'prenume'){
                ?><div class="mb-3" style="margin-left: 10px;margin-right: 300px;">
                <label for="prenume" class="form-label"><b>Prenume:</b></label>
                <?php echo $val."  ";?>
                <form method="post" action="update.php"><input type="textarea" class="form-control" name="prenume" placeholder="ex: Ana-Nicolae" required>
                <button type="submit" class="btn btn-outline-warning">Update</button></form></div><?php
            }
            if($key === 'email'){
                ?><div class="mb-3" style="margin-left: 10px;margin-right: 300px;">
                <label for="email" class="form-label"><b>E-mail:</b></label>
                <?php echo $val."  ";?>
                <form method="post" action="update.php"><input type="email" class="form-control" name="email" placeholder="ex: ananicolae@yahoo.com" required>
                <button type="submit" class="btn btn-outline-warning">Update</button></form></div><?php
            }
            if($key === 'parola'){
                ?><div class="mb-3" style="margin-left: 10px;margin-right: 300px;">
                <label for="parola" class="form-label"><b>Parola:</b></label> 
                <?php echo $val."  ";?>
                <form method="post" action="update.php"><input type="password" class="form-control" name="parola" placeholder="ex: ana123" required>
                <button type="submit" class="btn btn-outline-warning">Update</button></form></div><?php
            }
            if($key === 'numar_card'){
                ?><div class="mb-3" style="margin-left: 10px;margin-right: 300px;">
                <label for="numar_card" class="form-label"><b>Numar Card:</b></label> 
                <?php echo $val."  ";?>
                <form method="post" action="update.php">
                <input type="textarea" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" class="form-control" min="10000000" max="99999999" name="numar_card" placeholder=" ex: 1616-1616" required>
                <button type="submit" class="btn btn-outline-warning">Update</button></form></div><?php
            }
            if($key === 'data_nasterii'){
                ?><div class="mb-3" style="margin-left: 10px;margin-right: 300px;">
                <label for="numar_card" class="form-label"><b>Data nasterii:</b></label> 
                <?php echo $val."  ";?>
                <form method="post" action="update.php">
                <input type="datetime-local" class="form-control" name="data_nasterii" placeholder="ex: 11/24/2000" required>
                    <button type="submit" class="btn btn-outline-warning">Update</button></form></div></div><?php
            }
        }      
    }
    }?>
    </div>
    <hr>
    <div style="margin-left: 20px;">
    <form method="post" action="delete.php">
    <h2>Sterge contul:</h2>
    <button type="submit" name="delete" class="btn btn-outline-danger">Sterge</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    
  </body>
  <footer class="footer">
        &copy; 2022 E-SHOP designed by <a href="http://lungudaniel.com" target="_blank">LD</a>
    </footer>
</html>