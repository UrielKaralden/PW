<html>
	<head>
		<title>
			Crear Pregunta
		</title>
	</head>
	<body>
		<center>
		<form method="POST" action="aux_pregunta.php">
			<input type="text" name="nquestion" placeholder="Indique la pregunta que desea incluir o modificar"/>
			<br />
            <input type="text" name="typequestion" placeholder="Indique el tipo de pregunta que desea hacer"/>
			<br />
			<input type="text" name="modcre" placeholder="Modificar o Crear"/>
			<br />
			<?php
			    echo"<input type=\"hidden\" name=\"iden\" value=$_POST['id_section'] />";
			?>
			<button type="submit">Continuar</button>
		</form>
		</center>
	</body>
</html>
