<html>
	<head>
		<title>
			Encuesta de Satisfacción
		</title>
		<meta charset="UTF-8">
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
	</head>
	<body>
		<div>
			<center>
				<form method="POST" action="respuesta_encuesta.php">
                    <?php
                        session_start();
						$conexion = mysqli_connect('localhost',"root","",'Encuesta_profesorado') or die("Error al conectar " . mysqli_error());
						include "encabezado.php";
						$survey_id = $_POST['id_Encuesta'];
						$secciones_encuesta_query = "SELECT * FROM secciones WHERE id_Encuesta = '$survey_id';";
						$secciones_encuesta_result = mysqli_query($conexion, $secciones_encuesta_query) or die(mysqli_error($conexion));
						while($seccion_encuesta = mysqli_fetch_assoc($secciones_encuesta_result))
						{
							$actual_section_id = $seccion_encuesta['id'];
							$actual_section_text = $seccion_encuesta['nombre'];
							echo "<h4> Sección $actual_section_id: $actual_section_text </h4>";

							$preguntas_seccion_actual_query = "SELECT * FROM preguntas WHERE id_Seccion = '$actual_section_id';";
							$preguntas_seccion_actual = mysqli_query($conexion, $preguntas_seccion_actual_query) or die(mysqli_error($conexion));
							while($pregunta = mysqli_fetch_assoc($preguntas_seccion_actual))
							{
								$id_pregunta = $pregunta['id'];
								$tipo = $pregunta['tipo_pregunta'];
								$texto = $pregunta['pregunta'];

								echo "<br>$texto<br><br>";
								if($tipo == 'radio')
								{
									$respuestas_query = "SELECT * FROM radio_respuestas WHERE id_Pregunta = '$id_pregunta';";
									$respuestas_result = mysqli_query($conexion, $respuestas_query) or die(mysqli_error($conexion));
									while($respuesta = mysqli_fetch_assoc($respuestas_result))
									{
										$texto_respuesta = $respuesta['texto'];
										echo "$texto_respuesta <input type = \"$tipo\" name = \"$id_pregunta\" value = \"$texto\"><br>";
									}
								}
								else
								{
									echo "<input type = \"$tipo\" name = \"$id_pregunta\" placeholder = \"Responda aquí\"><br><br>";
								}
							}
						}
						echo "<textarea id = \"Observations\" name = \"Observaciones\" rows = \"10\" cols = \"70\">Puede indicar aquí cualquier observación si lo desea.</textarea>";
					?>
					<br><br><button type = "submit">Enviar respuestas</button><br>
				</form>
				<form action = "select_encuesta.php" method = "POST">
	                <br><br><button type = "submit">Volver</button><br>
	            </form>
				<?php
					include "pie.html";
				?>
			</center>
		</div>
	</body>
</html>
