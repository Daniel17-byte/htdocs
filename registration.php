<?php
session_start();
$_SESSION['nume']=NULL;
$_SESSION['prenume']=NULL;
$_SESSION['dataNasterii']=NULL;
$_SESSION['numarCard']=NULL;
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
                
                <label for="numarCard"><b>Numar Card</b></label>
                <input type="number" name="numarCard" min="10000000" max="99999999" placeholder=" ex:48579215" required>
                
                <label for="dataNasterii"><b>Data Nasterii</b></label>
                <input type="datetime-local" name="dataNasterii" placeholder="ex: 11/24/2000" required>
                
                <input type="submit" name="create" value="Inregistreaza-te!">

            </div>
        </form>
    </div>    
    </body>
</html>