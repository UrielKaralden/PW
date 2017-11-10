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

						echo "<table border = 1>";
		                echo "<div align=center>\n";

						//mysqli_fetch_array
						//mysqli_fetch_field Próxima tupla
						//Sustituir bucle por fetch
						while($next_question = mysqli_fetch_field($preguntas))
						{
		                  // 1º Cambiamos el color del fondo de la tabla en funcion
		                  // de la fila de la tabla
		                	if($iter_bucle%2==0)
		                      echo "<tr bgcolor=#bdc3d6>\n";
		                	else
		                      echo "<tr>\n";

							$num = $next_question->id;
							$section = $next_question->id_Secciones;
							$question_type = $next_question->tipo;
							$texto = $next_question->pregunta;

							echo "$texto<br>";
							if ($question_type == 'radio')
							{
								$respuestas_query = "Select * from radio_respuestas where id_Pregunta = $num";
								$respuestas = mysqli_query($conexion, $respuestas_query);
								while($info = mysqli_fecth_field($respuestas));
								{
									echo "$info->texto";
									echo "<input type = \"$question_type\" name = \"respuestas[]\"><br>";
								}
							}
							else
							{
								echo "<input type = \"$question_type\" name = \"respuestas[]\" placeholder=\"Responda aqui\"/><br><br>";
							}
							echo "<input type = \"hidden\" name = \"ids_pregunta[]\" value = \"$num\">";
		                }
						/*
	                    Como incluir comentario en la encuesta*/
	                    echo "<textarea name=\"comment\" rows=\"5\" cols=\"40\" placeholder = \"Observaciones\"></textarea>

						echo "<button type=\"submit\">Enviar respuestas</button><br>";
                    ?>
				</form>
			</center>
		</div>
	</body>
</html>
