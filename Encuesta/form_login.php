<html>
    <head>
        <title> Formulario de Creación de Usuarios </title>
    </head>
    <body>
    <?php
      echo "<div align = \"center\">
        <h1> Crear un nuevo usuario </h1>
        Para poder utilizar nuestro sistema de encuestas, <br>
        rellene los campos indicados a continuación <br>
        <form action = \"create_login.php\" method = \"POST\">
          Introduzca su nombre de usuario:
          <input type =\"text\" name=\"nickname\"><br>
          Introduzca una contraseña:
          <input type =\"password\" name=\"pswd\"><br>
          Repita la contraseña:
          <input type =\"password\" name=\"confirm_pswd\"><br>
          Introduzca el estudio al que pertenece:
          <input type =\"text\" name=\"estudio\"><br>
          <input type =\"hidden\" name=\"user_type\" value=\"user\" ><br>
          <input type =\"submit\" value=\"Enviar\"><br>
        </form>
      </div>";
    ?>
    </body>
</html>
