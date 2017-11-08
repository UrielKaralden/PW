<?php

    $pregunta = $_POST['nquestion'];
    $tipo = $_POST['typequestion'];
    $opcion = $_POST['modcre'];
    $section = $_POST['iden'];

    if($opcion == 'Modificar')
    {
        echo "<form action = \"ModPreg.php\" method = \"POST\">
        <input type=\"text\" name=\"col_mod\" placeholder=\"Dato a modificar\"/><br>
        <input type=\"text\" name=\"modification\" placeholder=\"Modificación\"/><br>
        <input type=\"hidden\" name=\"nquestion\" value=\"$pregunta\">
        <input type=\"hidden\" name=\"typequestion\" value=\"$tipo\">
        <input type=\"hidden\" name=\"modcre\" value=\"$opcion\">
        <input type=\"hidden\" name=\"iden\" value=\"$section\">
        <button type=\"submit\">Modificar</button>
        </form>";
    }
    else if($opcion == 'Crear')
    {
        if($tipo == 'radio')
        {
            echo "<form action = \"ModPreg.php\" method = \"POST\">
            <input type=\"text\" name=\"resp_1\" placeholder=\"Respuesta 1\"/><br>
            <input type=\"text\" name=\"resp_2\" placeholder=\"Respuesta 2\"/><br>
            <input type=\"text\" name=\"resp_3\" placeholder=\"Respuesta 3\"/><br>
            <input type=\"text\" name=\"resp_4\" placeholder=\"Respuesta 4\"/><br>
            <input type=\"text\" name=\"resp_5\" placeholder=\"Respuesta 5\"/><br>
            <input type=\"text\" name=\"resp_6\" placeholder=\"Respuesta 6\"/><br>
            <input type=\"hidden\" name=\"nquestion\" value=\"$pregunta\">
            <input type=\"hidden\" name=\"typequestion\" value=\"$tipo\">
            <input type=\"hidden\" name=\"modcre\" value=\"$opcion\">
            <input type=\"hidden\" name=\"iden\" value=\"$section\">
            <button type=\"submit\">Modificar</button>
            </form>";
        }
    }
?>
