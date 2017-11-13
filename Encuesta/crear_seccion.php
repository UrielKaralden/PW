<html>
	<head>
		<title>
			Editar Sección
		</title>
		<meta charset="UTF-8">
	</head>
	<body>
		<div align = "center">
            <h3> Editar Sección </h3>
            Por favor indique la seccion a la que desea acceder y <br>
			la operación a realizar.<br><br><br>
        </div>
		<center>
		<form method="POST" action="Modsec.php">
			<input type="text" name="nsection" placeholder="Nombre de Sección"/><br><br>
			Crear sección<input type="radio" name="option" value = "Crear" checked><br><br>
			Modificar sección<input type="radio" name="option" value = "Modificar" ><br><br>
			Eliminar sección<input type="radio" name="option" value = "Eliminar" ><br><br>
			<?php
				$survey_id = $_POST['id_Encuesta'];
				echo"<input type=\"hidden\" name=\"iden\" value=$survey_id>";
			?>
			<button type="submit">Continuar</button>
		</form>

		<form action = "admin_encuesta.php" method = "POST">
			<button type = "submit">Volver</button>
			<?php
				$survey_id = $_POST['id_Encuesta'];
				echo"<input type=\"hidden\" name=\"id_Encuesta\" value=$survey_id>";
			?>
		</form>
		</center>
	</body>
</html>
