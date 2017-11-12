<?php
	session_start();

	$nombre=$_POST['nsection'];
	$action=$_POST['option'];
	$identificator=$_POST['iden'];
	if(empty($nombre) && empty($action)){
		echo"<script>alert('Campos Vacios');window.location='crear_seccion.php';</script>";
		exit();
	}
	else{
		$conexion = mysqli_connect('localhost','root','','Encuesta_profesorado')or die("Error al conectar " . mysqli_error($conexion));
		if($action=="Modificar"){
			$seccion_query = "SELECT * from secciones where nombre='$nombre' and id_Encuesta='$identificator';";
			$result=mysqli_query($conexion, $seccion_query);
			if($row= mysqli_fetch_array($result))
			{
				$section_id = $row['id'];
				echo "<form action = \"crear_pregunta.php\" method = \"POST\">
				<input type = \"hidden\" name = \"id_section\" value = $section_id><br>
				</form>";
				exit();
			}else{
				echo"<script>alert('No existe seccion');window.location='crear_seccion.php';</script>";
				exit();
			}
		}else{
			if($action=="Crear"){
				$insert_section_query = "INSERT INTO secciones(id_Encuesta,nombre) VALUES('$identificator','$nombre');";
				$result = mysqli_query($conexion, $insert_section_query);
				if($result)
				{
					echo"<script>alert('Exito al crear');window.location='Modsec.php';</script>";
					echo"<form action = \"crear_seccion.php\" method = \"post\" id = \"seccion_creada\">
						<input type = \"hidden\" name = \"id_Encuesta\" value = \"$identificator\">
						</form>";
					echo "<script type=\"text/javascript\">document.getElementById(\"seccion_creada\").submit()</script>";
				}
				else
					echo"<script>alert('Ha ocurrido un error, vuelva a intentarlo');window.location='crear_seccion.php';</script>";
				exit();
			}else{
				if($action=="Eliminar"){
					$section_id_query = "SELECT id from secciones where nombre='$nombre';";
					$section_id = mysqli_query($conexion, $section_id_query);

					$preguntas_query = "SELECT * FROM preguntas WHERE id_Secciones = '$section_id';";
					$preguntas_object = mysqli_query($conexion, $preguntas_query);
					$preguntas = mysqli_fetch_assoc($preguntas_object);
					while($row = mysqli_fetch_field($preguntas))
					{
						$pregunta_id = $row['id'];
						$pregunta_type = $row['tipo_pregunta'];
						if($pregunta_type == 'radio')
						{
							// Eliminamos las radio_respuestas de esa pregunta
							$delete_radio_respuestas_query = "DELETE * FROM radio_respuestas where id_Pregunta = $pregunta_id;";
							$delete_radio_respuestas = mysqli_query($conexion, $delete_radio_respuestas_query);
							if($delete_radio_respuestas)
								echo "RADIO RESPUESTAS ELIMINADAS CORRECTAMENTE";
							else
							{
								echo "MERECES LA MUERTE, PINGU";
							}

							//Actualizamos los IDs de las demas radio_respuestas
							$select_ids_radio_respuestas_query = "SELECT id FROM radio_respuestas ORDER BY id asc;";
							$select_ids_radio_respuestas = mysqli_query($conexion, $select_ids_radio_respuestas_query);
							$radio_respuestas_ids = mysqli_fetch_assoc($select_ids_radio_respuestas);
							$cont = 1;
							while($rr_row = mysqli_fetch_field($radio_respuestas_ids))
							{
								$old_id = $rr_row['id'];
								$update_rr_query = "UPDATE radio_respuestas SET id = '$cont' where radio_respuestas.id = '$old_id';";
								$update_rr = mysqli_query($conexion, $update_rr_query);
								if($update_rr)
									echo "RADIO RESPUESTAS ACTUALIZADAS CORRECTAMENTE";
								else
								{
									echo "MERECES LA MUERTE, YASUO";
								}
							}
						}
						// Eliminamos las respuestas de esa pregunta
						$delete_respuestas_query = "DELETE * FROM respuestas WHERE id_Preguntas = $pregunta_id;";
						$delete_respuestas = mysqli_query($conexion, $delete_respuestas_query);
						if($delete_respuestas)
							echo "RESPUESTAS ELIMINADAS CORRECTAMENTE";
						else
						{
							echo "MERECES LA MUERTE, RONALD MACDONALD";
						}

						// Actualizar los ids de respuestas
						$select_ids_respuestas_query = "SELECT id FROM respuestas ORDER BY id asc;";
						$select_ids_respuestas = mysqli_query($conexion, $select_ids_respuestas_query);
						$respuestas_ids = mysqli_fetch_assoc($select_ids_respuestas);
						$cont = 1;
						while($r_row = mysqli_fetch_field($respuestas_ids))
						{
							$r_old_id = $r_row['id'];
							$update_r_query = "UPDATE respuestas SET id = '$cont' where respuestas.id = '$r_old_id';";
							$update_respuestas = mysqli_query($conexion, $update_r_query);
							if($update_respuestas)
								echo "RESPUESTA ACTUALIZADAS CORRECTAMENTE";
							else
							{
								echo "MERECES LA MUERTE, LLOQUER";
							}
						}

						// Eliminamos la pregunta en cuestion
						$delete_pregunta_query = "DELETE * FROM preguntas WHERE id = $pregunta_id;";
						$delete_pregunta = mysqli_query($conexion, $delete_pregunta);
						if($delete_pregunta)
						{
							echo "PREGUNTA ELIMINADA CORRECTAMENTE";
						}
						else
						{
							echo "MERECES LA MUERTE, GRIM MATCHSTICK";
						}
					}
					// Actualizamos las IDs de las preguntas
					$select_ids_preguntas_query = "SELECT id FROM preguntas ORDER BY id asc;";
					$select_ids_preguntas = mysqli_query($conexion, $select_ids_preguntas_query);
					$preguntas_ids = mysqli_fetch_assoc($select_ids_preguntas);
					$cont = 1;
					while($p_row = mysqli_fetch_field($preguntas_ids))
					{
						$p_old_id = $p_row['id'];
						$update_p_query = "UPDATE preguntas SET id = '$cont' where preguntas.id = '$p_old_id';";
						$update_preguntas = mysqli_query($conexion, $update_p_query);
						if($update_preguntas)
							echo "PREGUNTAS ACTUALIZADAS CORRECTAMENTE";
						else
						{
							echo "MERECES LA MUERTE, WEBMASTER";
						}
					}
				}else{
					echo"<script>alert('Esa opcion no existe');window.location='crear_seccion.php';</alert>";
					exit();
				}
			}
		}
	}
?>
