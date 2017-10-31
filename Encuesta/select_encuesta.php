<html>
    <head>
        <title> Selección de Encuestas </title>
    </head>
    <body>
        <div align = "center">
            <h3> Selección de Encuestas </h3>
            Por favor seleccione la encuesta a la que desea acceder. <br>
        </div>
        <div align = "center">
            <?php
                // Sessión con Mysql
                // $user_estudio = Estudio al que pertenece el usuario
                session_start();
                $conexion = mysqli_connect('localhost',"$_SESSION('usuario')","$_SESSION('password')",'Encuesta_profesorado') or die("Error al conectar " . mysqli_error());
                $buscar_estudio = "SELECT id_Estudio FROM Usuarios WHERE nombre = $_SESSION('usuario')";
                $estudio = $mysqli_query($buscar_estudio);
                $buscar_encuestas = "SELECT id FROM Encuestas WHERE $estudio = $user_estudio";
                $muestra_consultas = $mysqli_query($buscar_encuestas, $conexion);
                $num_encuestas = $mysqli_num_rows($muestra_consultas);
                echo "<table border = 1>";
                echo "<div align=center>\n";

                // Comprobar usuario

                // Usuario de tipo administrador
                $user_admin = $_SESSION('admin');
                if($user_admin)
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