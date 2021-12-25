<?php
session_start();
$_SESSION['id']=NULL;
$_SESSION['nume']=NULL;
$_SESSION['prenume']=NULL;
$_SESSION['email']=NULL;
$_SESSION['parola']=NULL;
$_SESSION['numar_card']=NULL;
$_SESSION['data_nasterii']=NULL;
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Register</title>
    <style>
            * {box-sizing: border-box}

/* Add padding to containers */
.container {
  padding: 16px;
}

/* Full-width input fields */
input[type=text], input[type=datetime], input[type=number] {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: none;
  background: #f1f1f1;
}

input[type=text]:focus, input[type=datetime]:focus,input[type=number]:focus {
  background-color: #ddd;
  outline: none;
}
      .footer {
    margin-top:5%;
    text-align:center;
    position: relative;
}

        </style>
  </head>
  <body>
    <nav class="navbar navbar-light bg-light">
      <div class="container-fluid">
        <span class="navbar-brand mb-0 h1">E-shop</span>
      </div>
    </nav>

    <div style="margin-left: 50px;margin-right:300px;">
        <form action="connect.php" method="post">
            <div class="container">
                <h1>Inregistrare</h1>
                <div class="mb-3">
                <label for="nume" class="form-label"><b>Nume:</b></label>
                <input type="textarea" class="form-control" name="nume" placeholder="ex: Lungu" required>
                </div>
                <div class="mb-3">
                <label for="prenume" class="form-label"><b>Prenume:</b></label>
                <input type="textarea" class="form-control" name="prenume" placeholder="ex: Ilie Daniel" required>
                </div>
                <div class="mb-3">
                <label for="email" class="form-label"><b>Adresa de e-mail:</b></label>
                <input type="email" class="form-control" name="email" placeholder="ex: lungud63@yahoo.com" required>
                </div>
                <div class="mb-3">
                <label for="parola" class="form-label"><b>Parola:</b></label>
                <input type="password" class="form-control" name="parola" placeholder="ex: parola123" required>
                </div>
                <div class="mb-3">
                <label for="numar_card" class="form-label"><b>Numar Card:</b></label>
                <input type="textarea" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" class="form-control" min="10000000" max="99999999" name="numar_card" placeholder=" ex: 4857-9215" required>
                </div>
                <div class="mb-3">
                <label for="data_nasterii" class="form-label"><b>Data Nasterii:</b></label>
                <input type="datetime-local" class="form-control" name="data_nasterii" placeholder="ex: 11/24/2000" required>
                </div>
                <button type="submit" name="create" class="btn btn-primary">Inregistreaza-te!</button>
            </div>
        </form>
    </div>   
    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    
  </body>
  <footer class="footer">
        &copy; 2022 E-SHOP designed by <a href="http://lungudaniel.com" target="_blank">LD</a>
    </footer>
</html>