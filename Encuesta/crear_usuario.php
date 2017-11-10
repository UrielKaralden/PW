<html>
    <head>
        <title> Registro de usuario </title>
    </head>
    <style>
        .error {color: #FF0000;}
    </style>
    <body>
        <div align = "center">
                <!--// Formulario de creación de usuario-->
                <h3> Registro de nuevo usuario </h3><br>
                <form action = "insert_user.php" method = "POST">
                    <p><span class="error">* Este campo es obligatorio</p>
                    Introduzca su nombre de usuario:
                    <input type = "text" name = "nombre" placeholder="Usuario">
                    <span class="error">* </span><br><br>
                    Introduzca su correo electrónico:
                    <input type = "text" name = "email" placeholder="Correo Electrónico">
                    <span class="error">* </span><br><br>
                    Introduzca contraseña:
                    <input type = "password" name = "password" placeholder="Contraseña">
                    <span class="error">* </span><br><br>
                    Introduzca el lugar donde se realizará el estudio:
                    <input type = "text" name = "estudio" placeholder="Lugar de Estudio">
                    <span class="error">* </span><br><br>
                    <button type = "submit">Crear</button>
                </form>
        </div>
    </body>
</html>
