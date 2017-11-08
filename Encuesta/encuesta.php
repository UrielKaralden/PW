<html>
	<head>
		<title>
			Encuesta de Satisfacción
		</title>
	</head>
	<body>
		<div>
			<center>
				<form method="POST" action="respuesta_encuesta.php">
                    <?php
                        session_start();
						$conexion = mysqli_connect('localhost',"root","",'Encuesta_profesorado') or die("Error al conectar " . mysqli_error());
                        $id_encuesta = $_POST['id_Encuesta'];

						$secciones_query = "Select id from secciones where id_Encuesta = $id_encuesta;";
						$secciones_encuesta = mysqli_query($conexion, $secciones_query);
						$preguntas_query = "Select * from preguntas where id_Secciones = $secciones_encuesta order by id,id_Secciones asc;";
						$preguntas = mysqli_query($conexion, $preguntas_query);
						$num_preguntas =

						echo "<table border = 1>";
		                echo "<div align=center>\n";

						//Sustituir bucle por fetch
						for($iter_bucle = 0; $iter_bucle < $num_preguntas; ++$iter_bucle)
		                {
		                  // 1º Cambiamos el color del fondo de la tabla en funcion
		                  // de la fila de la tabla
		                	if($iter_bucle%2==0)
		                      echo "<tr bgcolor=#bdc3d6>\n";
		                	else
		                      echo "<tr>\n";

		                	$tipo_pregunta_query = "Select tipo_pregunta from preguntas where id = $next_id;";
							$tipo_pregunta = mysqli_query($conexion, $tipo_pregunta_query);
							$pregunta_query = "Select pregunta from preguntas where id = $next_id;";
							echo ""
		                }

                    ?>
				</form>
			</center>
		</div>
	</body>
</html>
