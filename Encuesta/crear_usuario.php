<html>
    <head>
        <title> Registro de ususario </title>
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

                    <!--
                    Como incluir comentario en la encuesta
                    Comment: <textarea name="comment" rows="5" cols="40"></textarea>
                    -->

                    <button type = "submit">Crear</button>
                </form>
        </div>
    </body>
</html>
