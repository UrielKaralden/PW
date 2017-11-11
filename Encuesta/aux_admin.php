<?php
	session_start();
	$conexion = mysqli_connect('localhost','root','','Encuesta_profesorado')
	or die("Error al conectar " . mysqli_error());
	echo $_POST['option'];
	if(isset($_POST['option']))
	{
		$option_admin=$_POST['option'];
		echo $option_admin;
	}
	if(isset($_POST['id_Encuesta']))
	{
		$survey_id = $_POST['id_Encuesta'];
		echo $survey_id;
	}

	if($_POST['option']=='modificar')
	{
		echo "<form method=\"POST\" action=\"crear_seccion.php\">";

		echo "<input type=\"hidden\" name=\"id_Encuesta\" value= $survey_id />";
		echo "</form>";
		exit();

	}else if($_POST['option']=='eliminar')
	{
		for($iter_bucle = 0; $iter_bucle < $num_encuestas; ++$iter_bucle)
        {
			$result_array = mysqli_query("SELECT * from secciones where id='$iter_bucle' AND id_Encuesta='$iden'");
			$row = mysqli_fetch_assoc($result_array);
			$section_name = $row['nombre'];
			echo "<form method=\"POST\" action=\"Modsec.php\">";
			echo "<input type=\"hidden\" name=\"nsection\" value=\"$section_name\"/>";
			echo "<input type=\"hidden\" name=\"modcre\" value=\"Eliminar\"/>";
			echo "<input type=\"hidden\" name=\"iden\" value=$survey_id/>";
		}
		mysqli_close($conexion);
	}
	/*
	else
	{
		mysqli_close($conexion);
		//echo"<script>alert('Opcion no válida');window.location='Login.html';</script>";
	}
	*/
?>
