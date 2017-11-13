<html>
    <head>
        <title> Creación de Encuestas </title>
        <meta charset="UTF-8">
    </head>
    <body>
        <div align = "center">
            <h3> Creación de una nueva encuesta </h3><br>
            <form action = "insert_survey.php" method = "POST">
                Introduzca el nombre de la encuesta:
                <input type = "text" name = "nombre"><br>
                Introduzca una descripción de la encuesta:
                <input type = "text" name = "descripcion"><br>
                <button type = "submit">Crear</button><br>
            </form>
            <form action = "select_encuesta.php" method = "POST">
                <button type = "submit">Volver</button>
            </form>
        </div>
    </body>
</html>
