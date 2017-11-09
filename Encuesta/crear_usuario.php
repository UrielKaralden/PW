<html>
    <head>
        <title> Registro de ususario </title>
    </head>
    <body>
        <div align = "center">
                // Formulario de creación de usuario
                <h3> Registro de nuevo usuario </h3><br>
                <form action = "insert_user.php" method = "POST">
                    Introduzca su nombre de usuario:
                    <input type = "text" name = "nombre"><br><br>
                    Introduzca su correo electrónico:
                    <input type = "text" name = "email"><br><br>
                    Introduzca contraseña:
                    <input type = "password" name = "password"><br><br><br>
                    <button type = "submit">Crear</button>
                </form>";
        </div>
    </body>
</html>
