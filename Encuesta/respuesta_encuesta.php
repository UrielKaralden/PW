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
                $conexion = mysqli_connect('localhost',"root","",'Encuesta_profesorado') or die("Error al conectar " . mysqli_error());
				$survey_id = $_POST['id_Encuesta'];
				$usuario = $_SESSION['usuario'];
				$email = $_SESSION['email'];

				//Comprobamos si el usuario YA ha participado en la encuesta previamente
				$user_check_query= "SELECT * FROM usuarios where nombre = '$usuario' and email = '$email';";
				$user_check_result = mysqli_query($conexion, $user_check_query) or die("Error al conectar " . mysqli_error());
				if($saved_user_data = mysqli_fetch_assoc($user_check_result))
				{
					$saved_user = $saved_user_data['id'];
					$did_it_before_query = "SELECT * FROM participantes where id_usuario = '$saved_user';";
					$did_it_before_result = mysqli_query($conexion, $user_check_query) or die("Error al conectar " . mysqli_error());
					if($did_it = mysqli_num_rows($did_it_before_result) != 0)
					echo"<script>alert('Usted ha participado en la encuesta previamente.\n Lamentamos comunicarle que no puede volver a participar.\n Muchas gracias y disculpe las molestias.');window.location='select_encuesta.php';</script>";
					exit();
				}
				else
				{
					$secciones_query = "SELECT * FROM secciones where id_Encuesta = '$survey_id';";
					$secciones_result = mysqli_query($conexion, $secciones_query) or die("Error al conectar " . mysqli_error());
					while($seccion = mysqli_fetch_assoc($secciones_result))
					{
						$preguntas_query = "SELECT * FROM preguntas WHERE id_Seccion = '$seccion';";
						$preguntas_result = mysqli_query($conexion, $preguntas_query) or die("Error al conectar " . mysqli_error());
						while($pregunta = mysqli_fetch_assoc($preguntas_result))
						{
							$pregunta_id = $pregunta['id'];
							$respuesta_texto = $_POST["$pregunta_id"];
							if($respuesta_texto != '')
							{
								$respuesta_query = "INSERT INTO respuestas (id_Encuesta, id_Pregunta, respuesta) VALUES
								('$survey_id','$pregunta_id', '$respuesta_texto' );";
								$respuesta = mysqli_query($conexion, $respuesta_query) or die("Error al conectar " . mysqli_error());
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
					$user_data_result = mysqli_query($conexion, $user_data_query) or die("Error al conectar " . mysqli_error());
					if($user_data = mysqli_fetch_assoc($id_user_result))
					{
						$user = $user_data[$id];
						$participante_query = "INSERT INTO participantes(id_usuario, id_encuesta) VALUES ('$user', '$survey_id');";
						$participante_result = mysqli_query($conexion, $participante_query) or die("Error al conectar " . mysqli_error());
						if(!$participante_result)
						{
							echo"<script>alert('Ha habido un problema al almacenar sus respuestas. \nPor favor, repita la encuesta');window.location='select_encuesta.php';</script>";
							exit();
						}
						else {
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
				mysqli_close($conexion);
            ?>
		</div>
	</body>
</html>
