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
  <div>
        <form action="connect.php" method="post">
            <div class="container">
                <h1>Inregistrare</h1>

                <label for="nume"><b>Nume</b></label>
                <input type="text" name="nume" placeholder="ex: Lungu" required>
                
                <label for="prenume"><b>Prenume</b></label>
                <input type="text" name="prenume" placeholder="ex: Ilie Daniel" required>

                <label for="email"><b>Email</b></label>
                <input type="email" name="email" placeholder="ex: lungud63@yahoo.com" required><br><br>

                <label for="parola"><b>Parola</b></label>
                <input type="password" name="parola" placeholder="ex: parola123" required><br><br>
                
                <label for="numar_card"><b>Numar Card</b></label>
                <input type="number" name="numar_card" placeholder=" ex: 4857-9215" required>
                
                <label for="data_nasterii"><b>Data Nasterii</b></label>
                <input type="datetime-local" name="data_nasterii" placeholder="ex: 11/24/2000" required>
                
                <input type="submit" name="create" value="Inregistreaza-te!">

            </div>
        </form>
    </div>    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    
  </body>
  <footer class="footer">
        &copy; 2022 E-SHOP designed by <a href="http://lungudaniel.com" target="_blank">LD</a>
    </footer>
</html>