<?php
	$nombre=$_POST['question'];
	$tipo=$_POST['type_option'];
	$action=$_POST['option'];
	$identificator=$_POST['id_encuesta'];
	$id_section = $_POST['id_section'];
	if(empty($nombre) && empty($action) && empty($tipo)){
		echo"<script>alert('Campos Vacios');window.location='crear_pregunta.php';</script>";
		exit();
	}
	else{
		$conexion = mysqli_connect('localhost','root','','Encuesta_profesorado')or die("Error al conectar " . mysqli_error());
		/*
		if($action=="Modificar")
		{
			$modificar_pregunta_query = "SELECT * from preguntas where nombre='$nombre' and id_Encuesta='$identificator';";
			$result=mysqli_query($conexion, $modificar_pregunta_query) or die(mysqli_error($conexion));
			if($row= mysqli_fetch_field($result))
			{
				$id_question = $row['id'];
				$columna = $_POST['col_mod'];
                $modificacion = $_POST['modification'];
				$mod_pregunta_query = "UPDATE preguntas SET '$columna' = '$modificacion' WHERE preguntas.id = '$id_question';"
				$mod_pregunta = mysqli_query($conexion, $mod_pregunta_query) or die(mysqli_error($conexion));
				if($mod_pregunta)
				{
					echo "<form action = \"crear_pregunta.php\" method = \"POST\" id = \"exito_mod_pregunta\">
					<input type = \"hidden\" name = \"question\" value = \"$nombre\"><br>
					<input type = \"hidden\" name = \"type_option\" value = \"$tipo\"><br>
					<input type = \"hidden\" name = \"option\" value = \"$action\"><br>
					<input type = \"hidden\" name = \"id_encuesta\" value = \"$identificator\"><br>
					<input type = \"hidden\" name = \"id_section\" value = \"$id_section\"><br>
					</form>";
					echo "<script type=\"text/javascript\">document.getElementById(\"exito_mod_pregunta\").submit()</script>";
					exit();
				}
				else
				{
					echo"<script>alert('Error al modificar la pregunta');window.location='crear_seccion.php';</script>";
					echo "<form action = \"crear_pregunta.php\" method = \"POST\" id = \"error_mod_pregunta\">
					<input type = \"hidden\" name = \"question\" value = \"$nombre\"><br>
					<input type = \"hidden\" name = \"type_option\" value = \"$tipo\"><br>
					<input type = \"hidden\" name = \"option\" value = \"$action\"><br>
					<input type = \"hidden\" name = \"id_encuesta\" value = \"$identificator\"><br>
					<input type = \"hidden\" name = \"id_section\" value = \"$id_section\"><br>
					</form>";
					echo "<script type=\"text/javascript\">document.getElementById(\"error_mod_pregunta\").submit()</script>";
					exit();
				}
			}else{

				//echo"<script>alert('No existe seccion');";/*window.location='crear_pregunta.php'echo"</script>";
				/*echo "<form action = \"crear_pregunta.php\" method = \"POST\" id = \"error_mod_seccion\">
				<input type = \"hidden\" name = \"id_section\" value = \"$id_section\"><br>
				<input type = \"hidden\" name = \"id_Encuesta\" value = \"$identificator\"><br>
				</form>";
				echo "<script type=\"text/javascript\">document.getElementById(\"error_mod_seccion\").submit()</script>";
				exit();
				echo "NO petes";
			}
		}else
		{
			*/
		if($action=="Crear")
			{
				if($tipo == 'radio')
				{
                // Obtención de las respuestas de los radios
					$r1 = $_POST['resp_1'];
					$r2 = $_POST['resp_2'];
					$r3 = $_POST['resp_3'];
					$r4 = $_POST['resp_4'];
					$r5 = $_POST['resp_5'];
					$r6 = $_POST['resp_6'];

					/*$id_query = "SELECT max(id) FROM radio_respuestas;";
					$id_rr = mysqli_query($conexion, $id_query)or die(mysqli_error());
					$id_value = mysqli_fetch_field($id_rr);
					++$id_rr;*/

					/*$idp_query = "SELECT max(id) FROM preguntas;";
					$id_pregunta_result = mysqli_query($conexion, $idp_query)or die("Error al conectar " . mysqli_error());
					$id_pregunta = mysqli_fetch_field($id_pregunta_result);
					++$id_pregunta;*/

					$insert_pregunta = "INSERT INTO preguntas(id_Seccion, tipo_pregunta, pregunta) VALUES
					($section_id,'$tipo','$nombre');";
					$result = mysqli_query($conexion, $insert_pregunta)or die("Error al conectar " . mysqli_error($conexion));

					$pregunta_query = "SELECT * FROM preguntas where pregunta = '$nombre';";
					$pregunta_result = mysqli_query($conexion, $pregunta_query) or die(mysqli_error($conexion));
					$pregunta = mysqli_fetch_array($pregunta_result);
					$id_pregunta = $pregunta['id'];

					if(isset($r1))
					{
						$r1_query = "INSERT INTO radio_respuestas(id_Pregunta, texto) VALUES ('$id_pregunta', '$r1') ;";
						$radio_query = mysqli_query($conexion, $r1_query)or die("Error al conectar " . mysqli_error($conexion));
						echo "$r1 <br>";
					}
					if(isset($r2))
					{
						$r2_query = "INSERT INTO radio_respuestas(id_Pregunta, texto) VALUES ('$id_pregunta', '$r2');";
						$radio_query = mysqli_query($conexion, $r2_query)or die("Error al conectar " . mysqli_error($conexion));
						echo "$r2 <br>";
					}

					if(isset($r3))
					{
						$r3_query = "INSERT INTO radio_respuestas(id_Pregunta, texto) VALUES ('$id_pregunta', '$r3');";
						$radio_query = mysqli_query($conexion, $r3_query)or die("Error al conectar " . mysqli_error($conexion));
						echo "$r3 <br>";
					}

					if(isset($r4))
					{
						$r4_query = "INSERT INTO radio_respuestas(id_Pregunta, texto) VALUES ('$id_pregunta', '$r4');";
						$radio_query = mysqli_query($conexion, $r4_query)or die("Error al conectar " . mysqli_error($conexion));
						echo "$r4 <br>";
					}

					if(isset($r5))
					{
						$r5_query = "INSERT INTO radio_respuestas(id_Pregunta, texto) VALUES ('$id_pregunta', '$r5');";
						$radio_query = mysqli_query($conexion, $r5_query)or die("Error al conectar " . mysqli_error($conexion));
						echo "$r5 <br>";
					}

					if(isset($r6))
					{
						$r6_query = "INSERT INTO radio_respuestas(id_Pregunta, texto) VALUES ('$id_pregunta', '$r6');";
						$radio_query = mysqli_query($conexion, $r6_query)or die("Error al conectar " . mysqli_error($conexion));
						echo "$r6 <br>";
					}
				}

				/*if(empty($id_Pregunta))
				{
					$idp_query = "SELECT max(id) FROM preguntas;";
					$id_Pregunta = mysqli_query($conexion, $idp_query)or die("Error al conectar " . mysqli_error());

					++$id_Pregunta;
				}*/


				if($result)
				{
					echo"<script>alert('Exito al crear')</script>";
					echo "<form method=\"POST\" action = \"crear_pregunta.php\" id = \"exito_crear_pregunta\">";
					echo "<input type=\"hidden\" name=\"id_Encuesta\" value= $identificator />";
					echo "<input type=\"hidden\" name=\"id_section\" value= $id_section />";
					echo "</form>";
					echo "<script type=\"text/javascript\">document.getElementById(\"exito_crear_pregunta\").submit()</script>";
					exit();
				}
				else
				{
					echo"<script>alert('Ha ocurrido un error al crear la pregunta, vuelva a intentarlo')</script>";
					echo "<form method=\"POST\" action = \"crear_pregunta.php\" id = \"error_crear_pregunta\">";
					echo "<input type=\"hidden\" name=\"id_Encuesta\" value= $identificator />";
					echo "<input type=\"hidden\" name=\"id_section\" value= $id_section />";
					echo "</form>";
					echo "<script type=\"text/javascript\">document.getElementById(\"error_crear_pregunta\").submit()</script>";
				}
			}
			if($action=="Eliminar")
			{
				$delete_question_query = "SELECT * from preguntas where pregunta ='$nombre' AND id_Seccion='$identificator';";
				$result=mysqli_query($conexion, $delete_question_query)or die("Error al conectar " . mysqli_error($conexion));
				if($row=mysqli_fetch_array($result))
				{
					$id_question = $row['id'];
					$type_question = $row['tipo_pregunta'];

					$delete_question_query = "DELETE FROM preguntas WHERE id = '$id_question';";
					$delete_question = mysqli_query($conexion, $delete_question_query)or die("Error al conectar " . mysqli_error($conexion));

					$update_pres_query = "ALTER TABLE preguntas DROP id;";
					$update_pres=mysqli_query($conexion, $update_pres_query) or die (mysqli_error($conexion));
					$update_preg_query="ALTER TABLE preguntas ADD id int NOT NULL AUTO_INCREMENT PRIMARY KEY FIRST;";
					$update_preg=mysqli_query($conexion, $update_preg_query) or die (mysqli_error($conexion));
					$update_pre2s_query= "ALTER TABLE preguntas AUTO_INCREMENT =1;";
					$update_pre2s=mysqli_query($conexion, $update_pre2s_query) or die (mysqli_error($conexion));

					$delete_respuestas_query = "DELETE FROM respuestas WHERE id = '$id_question';";
					$delete_respuestas = mysqli_query($conexion, $delete_respuestas_query)or die("Error al conectar " . mysqli_error($conexion));

					$update_resp_query = "ALTER TABLE respuestas DROP id;";
					$update_resp=mysqli_query($conexion, $update_resp_query) or die (mysqli_error($conexion));
					$update_r_query="ALTER TABLE respuestas ADD id int NOT NULL AUTO_INCREMENT PRIMARY KEY FIRST;";
					$update_r=mysqli_query($conexion, $update_r_query) or die (mysqli_error($conexion));
					$update_r_ai_query= "ALTER TABLE respuestas AUTO_INCREMENT =1;";
					$update_r_ai=mysqli_query($conexion, $update_r_ai_query) or die (mysqli_error($conexion));

					if($type_question == 'radio')
					{
						$delete_rr_query = "DELETE FROM radio_respuestas WHERE id = '$id_question';";
						$delete_rr = mysqli_query($conexion, $delete_rr_query)or die("Error al conectar " . mysqli_error($conexion));

						$update_rr_query = "ALTER TABLE radio_respuestas DROP id;";
						$update_rr=mysqli_query($conexion, $update_rr_query) or die (mysqli_error($conexion));
						$update_rr2_query="ALTER TABLE radio_respuestas ADD id int NOT NULL AUTO_INCREMENT PRIMARY KEY FIRST;";
						$update_rr2=mysqli_query($conexion, $update_rr2_query) or die (mysqli_error($conexion));
						$update_rr_ai_query= "ALTER TABLE radio_respuestas AUTO_INCREMENT =1;";
						$update_rr_ai=mysqli_query($conexion, $update_rr_ai_query) or die (mysqli_error($conexion));
					}
					if($result)
					{
						echo"<script>alert('ELIMINACION CORRECTA')</script>";
						echo "<form method=\"POST\" action = \"crear_pregunta.php\" id = \"exito_delete_pregunta\">";
						echo "<input type=\"hidden\" name=\"id_Encuesta\" value= $identificator />";
						echo "<input type=\"hidden\" name=\"id_section\" value= $id_section />";
						echo "</form>";
						echo "<script type=\"text/javascript\">document.getElementById(\"exito_delete_pregunta\").submit()</script>";
						exit();
					}
					else
						echo"<script>alert(Ha ocurrido un error, vuelva a intentarlo')</script>";
						echo "<form method=\"POST\" action = \"crear_pregunta.php\" id = \"error_delete_pregunta\">";
						echo "<input type=\"hidden\" name=\"id_Encuesta\" value= $identificator />";
						echo "<input type=\"hidden\" name=\"id_section\" value= $id_section />";
						echo "</form>";
						echo "<script type=\"text/javascript\">document.getElementById(\"error_delete_pregunta\").submit()</script>";
						exit();
					exit();
				}else{
					echo"<script>alert('Ha ocurrido un error 2, vuelva a intentarlo');window.location='crear_pregunta.php';</script>";
					exit();
				}
			}else{
				echo"<script>alert('Esa opcion no existe');window.location='crear_pregunta.php';</alert>";
				exit();
		}
	}
?>
