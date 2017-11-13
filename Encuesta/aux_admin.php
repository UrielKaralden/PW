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
		echo"Aquí se debe eliminar la encuesta";
		echo "<input type=\"hidden\" name=\"id_Encuesta\" value= $survey_id />";
		echo "</form>";
		echo "<script type=\"text/javascript\">document.getElementById(\"modificar_envisualizar_encuestacuesta\").submit()</script>";
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

	mysqli_close($conexion);
?>
