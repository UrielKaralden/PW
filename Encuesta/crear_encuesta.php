<html>
    <head>
        <title> Creación de Encuestas </title>
    </head>
    <body>
        <div align = "center">
            <?php
            // Formulario de la encuesta
                echo "<h3> Creación de una nueva encuesta </h3><br>
                <form action = \"insert_survey.php\" method = \"POST\">
                    Introduzca el nombre de la encuesta:
                    <input type = \"text\" name = \"nombre\"><br>
                    Introduzca una descripción de la encuesta:
                    <input type = \"text\" name = \"descripcion\"><br>
                    <input type = \"submit\" value = \"Crear\"
                </form>";
            ?>
        </div>
    </body>
</html>
