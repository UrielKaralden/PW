<html>
	<head>
		<title>
			Editar Pregunta
		</title>
		<meta charset="UTF-8">
	</head>
	<body>
		<div align = "center">
            <h3> Editar Pregunta </h3>
            Por favor indique la pregunta a la que desea acceder ,<br>
			el tipo de pregunta y la operación a realizar.<br><br><br>
        </div>
		<center>
		<form method="POST" action="aux_pregunta.php">
			<h4>Introduzca el texto de la pregunta</h4>
			<input type="text" name="question" placeholder="Texto de pregunta"/><br><br><br>
			<h4>Tipo de pregunta</h4>
			Pregunta de texto<input type="radio" name="type_option" value = "text" checked><br><br>
			Pregunta numérica<input type="radio" name="type_option" value = "number" ><br><br>
			Pregunta de respuesta única<input type="radio" name="type_option" value = "radio" ><br><br>
			Recuadro de texto<input type="radio" name="type_option" value = "textarea" ><br><br>
			<!--Pregunta de respuesta mútiple<input type="radio" name="type_option" value = "radio" ><br><br><br>-->
			<h4>Operación a realizar</h4>
			Crear pregunta<input type="radio" name="option" value = "Crear" checked><br><br>
			<!--Modificar pregunta<input type="radio" name="option" value = "Modificar" ><br><br>-->
			Eliminar pregunta<input type="radio" name="option" value = "Eliminar" ><br><br>
			<?php
				$survey_id = $_POST['id_Encuesta'];
				$section_id = $_POST['id_section'];
				echo "<input type=\"hidden\" name=\"id_encuesta\" value=\"$survey_id\">";
				echo "<input type=\"hidden\" name=\"id_section\" value=\"$section_id\">";
			?>
			<button type="submit">Continuar</button>
		</form>
		<form action = "crear_seccion.php" method = "POST">
			<button type = "submit">Volver</button>
			<?php
				$survey_id = $_POST['id_Encuesta'];
				echo"<input type=\"hidden\" name=\"id_Encuesta\" value=$survey_id>";
			?>
		</form>

		</center>
	</body>
</html>
