<html>
	<head>
		<title>
			Almacenamiento de respuestas de las encuestas
		</title>
	</head>
	<body>
		<div>
			<?php
                session_start();
                $conexion = mysqli_connect('localhost',"root","",'Encuesta_profesorado') or die("Error al conectar " . mysqli_error($conexion));
				$survey_id = $_POST['id_Encuesta'];
				$usuario = $_SESSION['usuario'];
				$email = $_SESSION['email'];

				echo "$usuario";

				//Comprobamos si el usuario YA ha participado en la encuesta previamente
				echo "Buscando usuario...<br>";
				$user_check_query= "SELECT * FROM usuarios where nombre = '$usuario' and email = '$email';";
				$user_check_result = mysqli_query($conexion, $user_check_query) or die("Error al conectar " . mysqli_error($conexion));
				if($saved_user_data = mysqli_fetch_assoc($user_check_result))
				{
					$saved_user = $saved_user_data['id'];
					echo "Usuario seleccionado <br>";

					$all_participantes_query = "SELECT * FROM participantes where id_encuesta = '$survey_id';";
					$all_participantes_result = mysqli_query($conexion, $all_participantes_query) or die("Error al conectar " . mysqli_error($conexion));
					$num_participantes = mysqli_num_rows($all_participantes_result);
					echo "Numero de participantes = $num_participantes <br>";

					$not_this_user_query = "SELECT * FROM participantes where id_encuesta = '$survey_id' and id_usuario != '$saved_user';";
					$not_this_user_result = mysqli_query($conexion, $user_check_query) or die("Error al conectar " . mysqli_error($conexion));
					$not_this_user_rows = mysqli_num_rows($not_this_user_result);
					echo "Numero de participantes sin contar con el usuario actual = $not_this_user_rows <br>";

					$coincidence = $num_participantes - $not_this_user_rows;
					echo "Si $coincidence es 1, el usuario ha entrado previamente<br>";
					echo "Comprobando usuario...<br>";
					/*
					$num_rows_data = mysqli_fetch_array($did_it_before_result);
					$num_rows = $num_rows_data['0'];
					echo "$num_rows";*/
					if($coincidence == 0)

					{
						echo "Usuario duplicado <br>";
						//echo"<script>alert('Usted ha participado en la encuesta previamente.Lamentamos comunicarle que no puede volver a participar.Muchas gracias y disculpe las molestias.');window.location='select_encuesta.php';</script>";
						//exit();
					}
					else
					{
						echo "Usuario correcto <br>";
						$secciones_query = "SELECT * FROM secciones where id_Encuesta = '$survey_id';";
						$secciones_result = mysqli_query($conexion, $secciones_query) or die("Error al conectar 1" . mysqli_error($conexion));
						while($seccion_array = mysqli_fetch_assoc($secciones_result))
						{
							$seccion = $seccion_array['id'];
							echo "Buscando seccion <br>";
							$preguntas_query = "SELECT * FROM preguntas WHERE id_Seccion = '$seccion';";
							$preguntas_result = mysqli_query($conexion, $preguntas_query) or die("Error al conectar 2" . mysqli_error($conexion));
							while($pregunta = mysqli_fetch_assoc($preguntas_result))
							{

								$pregunta_id = $pregunta['id'];
								$respuesta_texto = $_POST["$pregunta_id"];
								if($respuesta_texto != '')
								{
									$respuesta_query = "INSERT INTO respuestas (id_Encuesta, id_Pregunta, id_usuario, respuesta) VALUES
									('$survey_id','$pregunta_id','$saved_user', '$respuesta_texto' );";
									$respuesta = mysqli_query($conexion, $respuesta_query) or die("Error al conectar 3" . mysqli_error($conexion));
									if(!$respuesta)
									{
										echo"<script>alert('Ha habido un problema al enviar sus respuestas. \nPor favor, repita la encuesta');window.location='select_encuesta.php';</script>";
										exit();
									}
									else
									{
										echo "Procesando la información. Espere un momento.";
									}
								}
							}
						}

						// Añadimos al usuario como participante de la encuesta
						$user_data_query = "SELECT * FROM usuarios where nombre = '$usuario';";
						$user_data_result = mysqli_query($conexion, $user_data_query) or die("Error al conectar " . mysqli_error($conexion));
						if($user_data = mysqli_fetch_assoc($user_data_result))
						{
							$user = $user_data['id'];
							$participante_query = "INSERT INTO participantes(id_usuario, id_encuesta) VALUES ('$user', '$survey_id');";
							$participante_result = mysqli_query($conexion, $participante_query) or die("Error al conectar " . mysqli_error($conexion));
							if(!$participante_result)
							{
								echo"<script>alert('Ha habido un problema al almacenar sus respuestas. \nPor favor, repita la encuesta');window.location='select_encuesta.php';</script>";
								exit();
							}
							else
							{
							echo"<script>alert('Sus respuestas han sido almacenadas. \nGracias por participar');;window.location='select_encuesta.php';</script>";
							exit();
							}
						}
						else
						{
							echo"<script>alert('Ha habido un problema al registrar sus respuestas. \nPor favor, repita la encuesta');window.location='select_encuesta.php';</script>";
							exit();
						}
					}
				}
				mysqli_close($conexion);
            ?>
		</div>
	</body>
</html>
