<html>
	<head>
		<title>
			Administrar Encuesta
		</title>
	</head>
	<body>
		<center>
		<form method="POST" action="aux_admin.php">
			<input type="text" name="auxmin" placeholder="Modificar/Crear o Eliminar"/>
			<br />
			<?php
			 echo"<input type=\"hidden\" name=\"id_Encuesta\" value=$_POST['id_Encuesta'] />";
			?>
			<button type="submit">Continuar</button>
		</form>
		</center>
	</body>
</html>