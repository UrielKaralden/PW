<html>
    <head>
        <title> Selección de Encuestas </title>
    </head>
    <body>
        <div align = "center">
            <h3> Selección de Encuestas </h3>
            Por favor seleccione la encuesta a la que desea acceder.
        </div>
        <div align = "center">
            <?php

                define("ADMIN", 1);
                error_reporting(E_ALL & ~E_NOTICE);
                // Sessión con Mysql
                // $user_estudio = Estudio al que pertenece el usuario
                session_start();
                $conexion = mysqli_connect('localhost',"root","",'Encuesta_profesorado') or die("Error al conectar " . mysqli_error());

                $user = mysqli_real_escape_string($conexion, $_SESSION['usuario']);
                $user_admin = mysqli_real_escape_string($conexion, $_SESSION['admin']);

                $buscar_estudio = "SELECT * FROM Usuarios WHERE nombre = '$user';";
                $estudio_res = mysqli_query($conexion, $buscar_estudio);
                $estudio = mysqli_fetch_assoc($estudio_res);
                $user_estudio = $estudio['id_Estudio'];
                $buscar_encuestas = "SELECT * FROM Encuestas WHERE id_Estudio = '$user_estudio';";
                $muestra_consultas = mysqli_query($conexion, $buscar_encuestas);
                $num_encuestas = mysqli_num_rows($muestra_consultas);

                echo "<table border = 1>";
                if($user_admin == ADMIN)
                {
                    echo "<div align = center>
                        <form action = \"crear_encuesta.php\" method = \"POST\">
                        <input type = \"submit\" value = \"Crear Encuesta\">
                        </form>
                        </div>";
                }
                echo "<div align=center>\n";
                // Comprobar usuario

                // Usuario de tipo administrador

                if($user_admin == 1)
                  $ref_encuesta = 'admin_encuesta.php';
                else
                  $ref_encuesta = 'encuesta.php';

                //Iniciar formulario
                echo "<form action = \"$ref_encuesta\" method = \"POST\">";

                $cont = 0;
                while($iter_bucle = mysqli_fetch_assoc($muestra_consultas))
                {
                    $survey_id = $iter_bucle['id'];
                    // 1º Cambiamos el color del fondo de la tabla en funcion
                    // de la fila de la tabla
                    if($cont%2==0)
                        echo "<tr bgcolor=#bdc3d6>\n";
                    else
                        echo "<tr>\n";

                    ++$cont;
                    $nombre_encuesta = $iter_bucle['nombre'];
                    echo "$nombre_encuesta <input type = \"radio\" name = \"id_Encuesta\" value=\"$survey_id\"><br><br>";
                }
                echo "<input type = \"submit\" value = \"Seleccionar\"><br>";
                /*
                if($user_admin == 1)
                    //echo "<button type = \"submit\" value = \"Administrar\";";
                echo "</form>";
                //echo "$user_admin";*/
                mysqli_close($conexion);
            ?>
        </div>
    </body>
</html>
