<html>
    <head>
        <title> Creación de Encuestas </title>
    </head>
    <body>
        <div align = "center">
            <?php
              echo "<h3> Creación de una nueva encuesta </h3><br>
              <form action = \"seccion_encuesta.php\" method = \"POST\">
                Introduzca el nombre de la encuesta:
                <input type = \"text\" name = \"nombre\">
                Introduzca una descripción de la encuesta:
                <input type = \"text\" name = \"descripcion\">
                <input type = \"submit\" value = \"Crear\"
              </form>"
            ?>
        </div>
    </body>
</html>
