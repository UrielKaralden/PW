<html>
    <head>
        <title> Selección de Encuestas </title>
    </head>
    <body>
        <div align = "center">
            <h1> Selección de Encuestas </h1>
            Por favor seleccione la encuesta a la que desea acceder. <br>
        </div>
        <div align = "center">


            <?php
                // Sessión con Mysql
                // $user_estudio = Estudio al que pertenece el usuario
                $user_estudio = 1;
                $sql_instruccion = "SELECT id FROM Encuestas WHERE id_Estudios = $user_estudio";
                $muestra_consultas = $mysqli_query($sql_instruccion, $conexion);
                $num_encuestas = $mysqli_num_rows($muestra_consultas);
                echo "<table border = 1>";
                echo "<div align=center>\n";

                // Comprobar usuario

                // Usuario de tipo administrador
                $user_type = 'admin';
                if($user_type == 'admin')
                  $ref_encuesta = 'admin_encuesta.php';
                else
                  $ref_encuesta = 'encuesta.php'

                //Iniciar formulario
                echo "<form action = \"$ref_encuesta\" method = \"POST\">";
                for($iter_bucle = 0; $iter_bucle < $num_encuestas; ++$iter_bucle)
                {
                  // 1º Cambiamos el color del fondo de la tabla en funcion
                  // de la fila de la tabla
                  if($iter_bucle%2==0)
                      echo "<tr bgcolor=#bdc3d6>\n";
                  else
                      echo "<tr>\n";

                  echo "<input type = \"radio\" name = \"id_Encuesta\" value=\"$iter_bucle\"";
                }
                echo "<input type = \"submit\" value = \"Seleccionar\">";
                echo "</form>";
            ?>
        </div>
    </body>
</html>
