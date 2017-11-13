<html>
	<head>
		<title>
			Administrar Encuesta
		</title>
	</head>
	<body>
		<div align = "center">
            <h3> Administración de la Encuesta </h3>
            Por favor seleccione una opción.<br><br>
        </div>
		<center>
		<form method="POST" action="aux_admin.php">
			<?php
			echo "Visualizar encuesta<input type=\"radio\" name=\"option\" value = \"visualizar\" checked><br><br>
			Modificar encuesta<input type=\"radio\" name=\"option\" value = \"modificar\"><br><br>
			Eliminar encuesta<input type = \"radio\" name = \"option\" value = \"eliminar\"><br><br>";
			?>
			<!--
			Modificar encuesta<input type="radio" name="option" value = "modificar" checked><br><br>
			Eliminar encuesta<input type = "radio" name = "option" value = "eliminar"><br><br>
			-->
			<button type="submit">Seleccionar</button><br>
			<?php
				$survey_id = $_POST['id_Encuesta'];
				//echo $survey_info;
				echo"<input type=\"hidden\" name=\"id_Encuesta\" value='$survey_id' />";
			?>
		</form>
		<form action = "select_encuesta.php" method = "POST">
			<button type = "submit">Volver</button>
		</form>

		</center>
	</body>
</html>
