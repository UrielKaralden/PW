<html>
    <head>
        <title> Cabecera para recibir el id de la encuesta </title>
    </head>
    <body>
        <?php
            $next_page = "";
            $id_Encuesta = $_POST['id_Encuesta'];
            echo "<form action = \"$next_page\" method = \"POST\">
            <input type = \"hidden\" name = \"id_Encuesta\" value = \"$id_Encuesta\"><br>
            </form>";
        ?>
    </body>
</html>
