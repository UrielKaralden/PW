<?php
    echo "
        <div align = \"center\">
            <h3>
                <font style =\"text-transform: capitalize;\">
                    sección 1: información del grupo del encuestado <br>
                    </font>
                </h3>
        </div>";

    echo "
        <div align = \"center\">
            <font style = \"text-transform: none;\">
                <form action = \"respuestas_s1.php\" method = \"POST\">
                    Código de Titulación
                    <input type = \"number\" name = \"Código de Titulación\">
                    Código de Asignatura
                    <input type = \"number\" name = \"Código de Asignatura\">
                    Código de Grupo
                    <input type = \"number\" name = \"Código de Grupo\"> <br><br>
                    <input type = \"submit\" value = \"Continuar\">
                    </form>
            </font>
        </div>";
?>
