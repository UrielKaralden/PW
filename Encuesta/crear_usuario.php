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
                <?php
                    // Comprobación de campos obligatorios
                    $nameErr = $emailErr = $pswdErr = "";
                    $name = $email = $pswd = "";
                    if ($_SERVER["REQUEST_METHOD"]=="POST")
                    {
                        if(empty($_POST['name']))
                            $nameErr = "El campo Usuario es obligatorio";
                        else
                            $name = test_input($_POST['name']);

                        if(empty($_POST['email']))
                            $emailErr = "El campo Correo Electrónico es obligatorio";
                        else
                            $email = test_input($_POST['email']);

                        if(empty($_POST['password']))
                            $pswdErr = "El campo Contraseña es obligatorio";
                        else
                            $pswd = test_input($_POST['password']);
                    }

                    function test_input($data)
                    {
                        $data = trim($data);
                        $data = stripslashes($data);
                        $data = htmlspecialchars($data);
                        return $data;
                    }
                ?>

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
