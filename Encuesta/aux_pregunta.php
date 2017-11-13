<?php

    $pregunta = $_POST['question'];
    $tipo = $_POST['type_option'];
    $opcion = $_POST['option'];
    $section = $_POST['id_section'];
    $survey = $_POST['id_encuesta'];

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
            <input type=\"hidden\" name=\"question\" value=\"$pregunta\">
            <input type=\"hidden\" name=\"type_option\" value=\"$tipo\">
            <input type=\"hidden\" name=\"option\" value=\"$opcion\">
            <input type=\"hidden\" name=\"id_section\" value=\"$section\">
            <input type=\"hidden\" name=\"id_encuesta\" value=\"$survey\">
            <button type=\"submit\">Crear pregunta</button>
            </form>";
        }
    }
?>
