<html>
	<head>
		<title>
			Crear Seccion
		</title>
	</head>
	<body>
		<center>
		<form method="POST" action="Modsec.php">
			<input type="text" name="nsection" placeholder="Section name"/>
			<br />
			<input type="text" name="modcre" placeholder="Modificar o Crear"/>
			<br />
			<?php
			 echo"<input type=\"hidden\" name=\"iden\" value=$_POST['id_encuesta'] />";
			?>
			<button type="submit">Continuar</button>
		</form>
		</center>
	</body>
</html>
