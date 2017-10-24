<?php
    // Inclusion de directivas de configuración
    include "config.php";
    // Inicio de sesión
    session_start();

    // Si user y password son enviados por formulario
    if($_SERVER["REQUEST_METHOD"]=="POST")
    {
        $myuser = mysqli_real_escape_string($db,$_POST['username']);
        $mypass = mysqli_real_escape_string($db,$_POST['password']);

        $userquery = "Select ID from admin where username = '$myuser'
        and password = '$mypass'";
        $result = mysqli_query($db,$userquery);
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
        $active = $row['active'];
        $count = mysql_num_rows($result);
        if($count == 1)
        {
            session_register("myusername");
            $_SESSION['login_user'] = $myusername;
        }
        else
        {
            $error = "El nombre de usuario o la consigna son infructuosos.";
        }
    }
?>

<html>
    <head>
        <title> Identificacion Personal </title>
    </head>

    <body>
        <form action = "" method = "post">
            <label>Usuario :</label><input type = "text" name = "username"><br>
            <label>Contraseña :</label><input type = "password" name = "password"><br>
            <input type = "submit" value = "Comprobar"><br>
        </form>
    </body>
</html>
