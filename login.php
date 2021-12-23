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
<!DOCTYPE html>
<html>
    <head>
        <title>User Registration</title>
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
                <h1>Conectare</h1>

                <label for="email"><b>Email</b></label>
                <input type="email" name="email" placeholder="ex: lungud63@yahoo.com" required>
                
                <label for="parola"><b>Parola</b></label>
                <input type="password" name="parola" placeholder="ex: parola123" required>
    
                <input type="submit" name="con" value="Conecteaza-te!">

            </div>
        </form>
    </div>    
    </body>
    <footer class="footer">
        &copy; 2022 E-SHOP designed by <a href="http://lungudaniel.com" target="_blank">LD</a>
    </footer>
</html>