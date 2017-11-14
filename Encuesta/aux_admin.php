<?php
	session_start();
	$conexion = mysqli_connect('localhost','root','','Encuesta_profesorado')
	or die("Error al conectar " . mysqli_error());
	//echo $_POST['option'];
	if(isset($_POST['option']))
	{
		$option_admin=$_POST['option'];
		//echo $option_admin;
	}
	if(isset($_POST['id_Encuesta']))
	{
		$survey_id = $_POST['id_Encuesta'];
		//echo $survey_id;
	}

	if($option_admin=='modificar')
	{
		echo "MUERE,INSECTO";
		echo "<form method=\"POST\" action = \"crear_seccion.php\" id = \"modificar_encuesta\">";
		echo "<input type=\"hidden\" name=\"id_Encuesta\" value= $survey_id />";
		echo "</form>";
		echo "<script type=\"text/javascript\">document.getElementById(\"modificar_encuesta\").submit()</script>";
		exit();

	}else if($option_admin=='eliminar')
	{
	/*Eliminar encuesta*/
		$section_id_query = "SELECT id from secciones where id_Encuesta='$survey_id';";
		$section_id_result = mysqli_query($conexion, $section_id_query)or die (mysqli_error($conexion));
		while($section_assoc = mysqli_fetch_assoc($section_id_result)){
			$section_id = $section_assoc['id'];
			$preguntas_query = "SELECT * FROM preguntas WHERE id_Seccion = '$section_id';";
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
					$update_prerr_query = "ALTER TABLE radio_respuestas DROP id;";
					$update_prerr=mysqli_query($conexion, $update_prerr_query) or die (mysqli_error($conexion));
					$update_rr_query="ALTER TABLE radio_respuestas ADD id int NOT NULL AUTO_INCREMENT PRIMARY KEY FIRST;";
					$update_rr=mysqli_query($conexion, $update_rr_query) or die (mysqli_error($conexion));
					$update_pre2rr_query= "ALTER TABLE radio_respuestas AUTO_INCREMENT =1;";
					$update_pre2rr=mysqli_query($conexion, $update_pre2rr_query) or die (mysqli_error($conexion));

					if($update_rr)
						echo "RADIO RESPUESTAS ACTUALIZADAS CORRECTAMENTE <br>";
					else
					{
						echo "MERECES LA MUERTE, YASUO <br>";
					}
				}
				$delete_respuestas_query = "DELETE  FROM respuestas WHERE id_Pregunta = '$pregunta_id';";
				$delete_respuestas = mysqli_query($conexion, $delete_respuestas_query) or die (mysqli_error($conexion));
				if($delete_respuestas)
					echo "RESPUESTAS ELIMINADAS CORRECTAMENTE <br>";
				else
				{
					echo "MERECES LA MUERTE, RONALD MACDONALD <br>";
				}
				$select_ids_respuestas_query = "SELECT id FROM respuestas ORDER BY id asc;";
				$select_ids_respuestas = mysqli_query($conexion, $select_ids_respuestas_query) or die (mysqli_error($conexion));
				$cont = 1;
				$update_prer_query = "ALTER TABLE respuestas DROP id;";
				$update_prer=mysqli_query($conexion, $update_prer_query) or die (mysqli_error($conexion));
				$update_r_query="ALTER TABLE respuestas ADD id int NOT NULL AUTO_INCREMENT PRIMARY KEY FIRST;";
				$update_respuestas=mysqli_query($conexion, $update_r_query) or die (mysqli_error($conexion));
				$update_pre2r_query= "ALTER TABLE respuestas AUTO_INCREMENT =1;";
				$update_pre2r=mysqli_query($conexion, $update_pre2r_query) or die (mysqli_error($conexion));
				if($update_respuestas)
					echo "RESPUESTA ACTUALIZADAS CORRECTAMENTE<br>";
				else
				{
					echo "MERECES LA MUERTE, LLOQUER<br>";
				}
				$delete_pregunta_query = "DELETE FROM preguntas WHERE id = '$pregunta_id';";
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
			$update_prep_query = "ALTER TABLE preguntas DROP id;";
			$update_prep=mysqli_query($conexion, $update_prep_query) or die (mysqli_error($conexion));
			$update_p_query="ALTER TABLE preguntas ADD id int NOT NULL AUTO_INCREMENT PRIMARY KEY FIRST;";
			$update_preguntas=mysqli_query($conexion, $update_p_query) or die (mysqli_error($conexion));
			$update_pre2p_query= "ALTER TABLE preguntas AUTO_INCREMENT =1;";
			$update_pre2p=mysqli_query($conexion, $update_pre2p_query) or die (mysqli_error($conexion));

			if($update_preguntas)
				echo "PREGUNTAS ACTUALIZADAS CORRECTAMENTE<br>";
			else
			{
				echo "MERECES LA MUERTE, WEBMASTER<br>";
			}
			$delete_section_query = "DELETE  FROM secciones WHERE id = '$section_id';";
			$delete_section = mysqli_query($conexion, $delete_section_query) or die (mysqli_error($conexion));
			if(isset($delete_section))
				echo "SECCION ELIMINADA CORRECTAMENTE <br>";
			else
			{
				echo "MERECES LA MUERTE, LUIS <br>";
			}
			$select_ids_secciones_query = "SELECT id FROM secciones ORDER BY id asc;";
			$select_ids_secciones = mysqli_query($conexion, $select_ids_secciones_query) or die (mysqli_error($conexion));
			$num_secciones = mysqli_num_rows($select_ids_secciones);
			$cont = 1;
			$update_pres_query = "ALTER TABLE secciones DROP id;";
			$update_pres=mysqli_query($conexion, $update_pres_query) or die (mysqli_error($conexion));
			$update_s_query="ALTER TABLE secciones ADD id int NOT NULL AUTO_INCREMENT PRIMARY KEY FIRST;";
			$update_s=mysqli_query($conexion, $update_s_query) or die (mysqli_error($conexion));
			$update_pre2s_query= "ALTER TABLE secciones AUTO_INCREMENT =1;";
			$update_pre2s=mysqli_query($conexion, $update_pre2s_query) or die (mysqli_error($conexion));

			if($update_s)
				echo "SECCIONES ACTUALIZADAS CORRECTAMENTE <br>";
			else
			{
				echo "MERECES LA MUERTE, ALEJANDRO <br>";
			}
		}
		$delete_encuesta_query="DELETE FROM encuestas WHERE id='$survey_id';";
		$delete_encuesta=mysqli_query($conexion, $delete_encuesta_query) or die (mysqli_error($conexion));
		if(isset($delete_encuesta))
			echo "ENCUESTA ELIMINADA CORRECTAMENTE <br>";
		else{
			echo "MERECES LA MUERTE SANTI";
		}
		$update_en_query = "ALTER TABLE encuestas DROP id;";
		$update_en=mysqli_query($conexion, $update_en_query) or die (mysqli_error($conexion));
		$update_en2_query="ALTER TABLE encuestas ADD id int NOT NULL AUTO_INCREMENT PRIMARY KEY FIRST;";
		$update_en2=mysqli_query($conexion, $update_en2_query) or die (mysqli_error($conexion));
		$update_en3_query= "ALTER TABLE encuestas AUTO_INCREMENT =1;";
		$update_en3=mysqli_query($conexion, $update_en3_query) or die (mysqli_error($conexion));
		echo "<form action = \"select_encuesta.php\" method = \"post\" id = \"eliminar_encuesta\">";
		echo "</form>";
		echo "<script type=\"text/javascript\">document.getElementById(\"eliminar_encuesta\").submit()</script>";
		exit();
	}
	else if ($option_admin == 'visualizar')
	{
		echo "<form method=\"POST\" action = \"encuesta.php\" id = \"visualizar_encuesta\">";
		echo "<input type=\"hidden\" name=\"id_Encuesta\" value= $survey_id />";
		echo "</form>";
		echo "<script type=\"text/javascript\">document.getElementById(\"visualizar_encuesta\").submit()</script>";
		exit();
	}
	else if ($option_admin == 'analizar')
	{
		$pagina_analisis_encuesta = 'nada';//Poner aqui la pagina PHP o HTML
		echo "<form method=\"POST\" action = \"$pagina_analisis_encuesta\" id = \"analizar_encuesta\">";
		echo "<input type=\"hidden\" name=\"id_Encuesta\" value= $survey_id />";
		echo "</form>";
		echo "<script type=\"text/javascript\">document.getElementById(\"analizar_encuesta\").submit()</script>";
	}

	mysqli_close($conexion);
?>
