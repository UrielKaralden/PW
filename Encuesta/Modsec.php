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
			$result=mysqli_query($conexion, $seccion_query) or die (mysqli_error($conexion));
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
				$result = mysqli_query($conexion, $insert_section_query)or die (mysqli_error($conexion));
				if($result)
				{
					echo"<script>alert('Exito al crear')";/*window.location='Modsec.php';*/echo "</script>";
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
					$section_id_result = mysqli_query($conexion, $section_id_query)or die (mysqli_error($conexion));
					$section_assoc = mysqli_fetch_assoc($section_id_result);
					$section_id = $section_assoc['id'];

					$preguntas_query = "SELECT * FROM preguntas WHERE id_Secciones = '$section_id';";
					$preguntas_object = mysqli_query($conexion, $preguntas_query)or die (mysqli_error($conexion));
					while($row = mysqli_fetch_assoc($preguntas_object))
					{
						$pregunta_id = $row['id'];
						$pregunta_type = $row['tipo_pregunta'];
						if($pregunta_type == 'radio')
						{
							// Eliminamos las secciones de esa pregunta
							$delete_secciones_query = "DELETE * FROM secciones where secciones.id_Pregunta = $pregunta_id;";
							$delete_secciones = mysqli_query($conexion, $delete_secciones_query) or die (mysqli_error($conexion));
							if($delete_secciones)
								echo "RADIO RESPUESTAS ELIMINADAS CORRECTAMENTE <br>";
							else
							{
								echo "MERECES LA MUERTE, PINGU <br>";
							}

							//Actualizamos los IDs de las demas radio_respuestas
							$select_ids_radio_respuestas_query = "SELECT id FROM radio_respuestas ORDER BY id asc;";
							$select_ids_radio_respuestas = mysqli_query($conexion, $select_ids_radio_respuestas_query)
								or die (mysqli_error($conexion));
							$cont = 1;
							/*while($rr_row = mysqli_fetch_assoc($select_ids_radio_respuestas))
							{*/
								/*$old_id = $rr_row['id'];
								$update_rr_query = "UPDATE radio_respuestas SET id = '$cont' where radio_respuestas.id = '$old_id';";
								$update_rr = mysqli_query($conexion, $update_rr_query) or die (mysqli_error($conexion));
								*/
								$update_prerr_query = "ALTER TABLE radio_respuestas DROP id;";
								$update_prerr=mysqli_query($conexion, $update_prerr_query) or die (mysqli_error($conexion));
								$update_pre2rr_query= "ALTER TABLE radio_respuestas AUTO_INCREMENT =1;";
								$update_pre2rr=mysqli_query($conexion, $update_pre2rr_query) or die (mysqli_error($conexion));
								$update_rr_query="ALTER TABLE radio_respuestas ADD id int NOT NULL AUTO_INCREMENT PRIMARY KEY FIRST;";
								$update_rr=mysqli_query($conexion, $update_rr_query) or die (mysqli_error($conexion));
								if($update_rr)
									echo "RADIO RESPUESTAS ACTUALIZADAS CORRECTAMENTE <br>";
								else
								{
									echo "MERECES LA MUERTE, YASUO <br>";
								}
							/*}*/
						}
						// Eliminamos las respuestas de esa pregunta
						$delete_respuestas_query = "DELETE  FROM respuestas WHERE respuestas.id_Preguntas = '$pregunta_id';";
						$delete_respuestas = mysqli_query($conexion, $delete_respuestas_query) or die (mysqli_error($conexion));
						if($delete_respuestas)
							echo "RESPUESTAS ELIMINADAS CORRECTAMENTE <br>";
						else
						{
							echo "MERECES LA MUERTE, RONALD MACDONALD <br>";
						}

						// Actualizar los ids de respuestas
						$select_ids_respuestas_query = "SELECT id FROM respuestas ORDER BY id asc;";
						$select_ids_respuestas = mysqli_query($conexion, $select_ids_respuestas_query) or die (mysqli_error($conexion));
						$cont = 1;
						/*while($r_row = mysqli_fetch_assoc($select_ids_respuestas))
						{
							$r_old_id = $r_row['id'];
							$update_r_query = "UPDATE respuestas SET id = '$cont' where respuestas.id = '$r_old_id';";
							$update_respuestas = mysqli_query($conexion, $update_r_query) or die (mysqli_error($conexion));
							if($update_respuestas)
								echo "RESPUESTA ACTUALIZADAS CORRECTAMENTE<br>";
							else
							{
								echo "MERECES LA MUERTE, LLOQUER<br>";
							}
						}*/
						$update_prer_query = "ALTER TABLE respuestas DROP id;";
						$update_prer=mysqli_query($conexion, $update_prer_query) or die (mysqli_error($conexion));
						$update_pre2r_query= "ALTER TABLE respuestas AUTO_INCREMENT =1;";
						$update_pre2r=mysqli_query($conexion, $update_pre2r_query) or die (mysqli_error($conexion));
						$update_r_query="ALTER TABLE respuestas ADD id int NOT NULL AUTO_INCREMENT PRIMARY KEY FIRST;";
						$update_respuestas=mysqli_query($conexion, $update_r_query) or die (mysqli_error($conexion));
						if($update_respuestas)
							echo "RESPUESTA ACTUALIZADAS CORRECTAMENTE<br>";
						else
						{
							echo "MERECES LA MUERTE, LLOQUER<br>";
						}

						// Eliminamos la pregunta en cuestion
						$delete_pregunta_query = "DELETE FROM preguntas WHERE preguntas.id = '$pregunta_id';";
						$delete_pregunta = mysqli_query($conexion, $delete_pregunta_query) or die (mysqli_error($conexion));
						if(isset($delete_pregunta))
							if($delete_pregunta)
						{
							echo "PREGUNTA ELIMINADA CORRECTAMENTE<br>";
						}
						else
						{
							echo "MERECES LA MUERTE, GRIM MATCHSTICK<br>";
						}
					}
					// Actualizamos las IDs de las preguntas
					$select_ids_preguntas_query = "SELECT id FROM preguntas ORDER BY id asc;";
					$select_ids_preguntas = mysqli_query($conexion, $select_ids_preguntas_query) or die (mysqli_error($conexion));
					$num_preguntas = mysqli_num_rows($select_ids_preguntas);
					$cont = 1;
					/*while($p_row = mysqli_fetch_assoc($select_ids_preguntas))
					{
						$p_old_id = $p_row['id'];
						$new_id = $num_preguntas + $cont;
						$update_p_query = "UPDATE preguntas SET id = '$new_id' where preguntas.id = '$p_old_id';";
						++$cont;
						$update_preguntas = mysqli_query($conexion, $update_p_query) or die (mysqli_error($conexion));

						$select_ids_preguntas_query = "SELECT id FROM preguntas ORDER BY id asc;";
						$select_ids_preguntas = mysqli_query($conexion, $select_ids_preguntas_query) or die (mysqli_error($conexion));
						$num_preguntas = mysqli_num_rows($select_ids_preguntas);
						$cont = 1;
						while($p_row = mysqli_fetch_assoc($select_ids_preguntas))
						{
							$p_old_id = $p_row['id'];
							$update_p_query = "UPDATE preguntas SET id = '$cont' where preguntas.id = '$p_old_id';";
							++$cont;
							$update_preguntas = mysqli_query($conexion, $update_p_query) or die (mysqli_error($conexion));

							if($update_preguntas)
								echo "PREGUNTAS ACTUALIZADAS CORRECTAMENTE <br>" ;
							else
							{
								echo "MERECES LA MUERTE, WEBMASTER <br>";
							}
						}
					}*/
					$update_prep_query = "ALTER TABLE preguntas DROP id;";
					$update_prep=mysqli_query($conexion, $update_prep_query) or die (mysqli_error($conexion));
					$update_pre2p_query= "ALTER TABLE preguntas AUTO_INCREMENT =1;";
					$update_pre2p=mysqli_query($conexion, $update_pre2p_query) or die (mysqli_error($conexion));
					$update_p_query="ALTER TABLE preguntas ADD id int NOT NULL AUTO_INCREMENT PRIMARY KEY FIRST;";
					$update_preguntas=mysqli_query($conexion, $update_p_query) or die (mysqli_error($conexion));
					if($update_preguntas)
						echo "PREGUNTAS ACTUALIZADAS CORRECTAMENTE<br>";
					else
					{
						echo "MERECES LA MUERTE, WEBMASTER<br>";
					}
					$delete_section_query = "DELETE  FROM secciones WHERE secciones.id = '$section_id';";
					$delete_section = mysqli_query($conexion, $delete_section_query) or die (mysqli_error($conexion));
					if(isset($delete_section))
						echo "SECCION ELIMINADA CORRECTAMENTE <br>";
					else
					{
						echo "MERECES LA MUERTE, LUIS <br>";
					}
					//Actualizamos los IDs de las demas secciones
					$select_ids_secciones_query = "SELECT id FROM secciones ORDER BY id asc;";
					$select_ids_secciones = mysqli_query($conexion, $select_ids_secciones_query) or die (mysqli_error($conexion));
					$num_secciones = mysqli_num_rows($select_ids_secciones);
					$cont = 1;
					/*$new_id = $num_secciones +$cont;
					while($s_row = mysqli_fetch_assoc($select_ids_secciones))
					{
						$s_old_id = $s_row['id'];
						$update_s_query = "UPDATE secciones SET id = '$new_id' where secciones.id = '$s_old_id';";
						$update_s = mysqli_query($conexion, $update_s_query) or die (mysqli_error($conexion));

						$select_ids_secciones_query = "SELECT id FROM secciones ORDER BY id asc;";
						$select_ids_secciones = mysqli_query($conexion, $select_ids_secciones_query) or die (mysqli_error($conexion));
						$cont = 1;
						while($s_row = mysqli_fetch_assoc($select_ids_secciones))
						{
							$s_old_id = $s_row['id'];
							$update_s_query = "UPDATE secciones SET id = '$cont' where secciones.id = '$s_old_id';";
							$update_s = mysqli_query($conexion, $update_s_query) or die (mysqli_error($conexion));
							if($update_s)
								echo "SECCIONES ACTUALIZADAS CORRECTAMENTE <br>";
							else
							{
								echo "MERECES LA MUERTE, ALEJANDRO <br>";
							}
						}
					}*/
					$update_pres_query = "ALTER TABLE secciones DROP id;";
					$update_pres=mysqli_query($conexion, $update_pres_query) or die (mysqli_error($conexion));
					$update_pre2s_query= "ALTER TABLE seccones AUTO_INCREMENT =1;";
					$update_pre2s=mysqli_query($conexion, $update_pre2s_query) or die (mysqli_error($conexion));
					$update_s_query="ALTER TABLE secciones ADD id int NOT NULL AUTO_INCREMENT PRIMARY KEY FIRST;";
					$update_s=mysqli_query($conexion, $update_s_query) or die (mysqli_error($conexion));
					if($update_s)
						echo "SECCIONES ACTUALIZADAS CORRECTAMENTE <br>";
					else
					{
						echo "MERECES LA MUERTE, ALEJANDRO <br>";
					}
				}else{
					echo"<script>alert('Esa opcion no existe');window.location='crear_seccion.php';</alert>";
					exit();
				}
			}
		}
	}
?>
