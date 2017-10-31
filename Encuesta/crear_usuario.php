<html>
    <head>
        <title> Registro de ususario </title>
    </head>
    <body>
        <div align = "center">
            <?php
                // Formulario de creación de usuario
                echo "<h3> Registro de nuevo usuario </h3><br>
                <form action = \"insert_user.php\" method = \"POST\">
                    Introduzca su nombre de usuario:
                    <input type = \"text\" name = \"nombre\"><br>
                    Introduzca contraseña:
                    <input type = \"text\" name = \"password\"><br>
                    <button type = \"submit\">Crear</button>
                </form>";
            ?>
        </div>
    </body>
</html>