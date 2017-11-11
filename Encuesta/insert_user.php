<html>
<head>
	<title>Insertar Usuarios</title>
</head>
<body>
<?php
    error_reporting(E_ALL & ~E_NOTICE);
    // Resolución del formulario de la encuesta

	// Comprobación de campos obligatorios
	$nameErr = $emailErr = $pswdErr = $estudioErr = "";
	$name = $email = $pswd = $estudio = "";
	if ($_SERVER["REQUEST_METHOD"]=="POST")
	{
		if(empty($_POST['nombre']))
			$nameErr = "El campo Usuario es obligatorio";
		else
			$name = test_input($_POST['nombre']);

		if(empty($_POST['email']))
			$emailErr = "El campo Correo Electrónico es obligatorio";
		else
			$email = test_input($_POST['email']);

		if(empty($_POST['password']))
			$pswdErr = "El campo Contraseña es obligatorio";
		else
			$pswd = test_input($_POST['password']);

		if(empty($_POST['estudio']))
			$estudioErr = "El campo Contraseña es obligatorio";
		else
			$estudio = test_input($_POST['estudio']);
	}

	function test_input($data)
	{
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}

    if (empty($name) && empty($email) && empty($pswd) && empty($estudio))
	    echo"<script>alert('Ha dejado un campo obligatorio sin rellenar. \nPor favor, revíselo');window.location='crear_usuario.php';</script>";
	else
	{
    	if($name == 'admin')
			$value = 1;
		else
			$value = 0;

		session_start();
		$conexion = mysqli_connect('localhost',"root","",'Encuesta_profesorado') or die("Error al conectar " . mysqli_error());
		mysqli_set_charset($conexion,"utf8");

		// Comprobamos que existe el estudio
		$new_estudio_query = "SELECT id FROM estudios WHERE nombre = '$estudio';";
		$new_estudio_result = mysqli_query($conexion, $new_estudio_query);
		$num_estudios = mysqli_num_rows($new_estudio_result);
		if($num_estudios==0)
		{
			$insert_estudio_query = "INSERT INTO estudios (nombre) VALUES ('$estudio');";
			mysqli_query($conexion, $insert_estudio_query);
		}

		$id_estudio_query = "SELECT id FROM estudios WHERE nombre = '$estudio';";
		$id_estudio_result = mysqli_query($conexion, $new_estudio_query);
		$id_estudio = mysqli_fetch_assoc($id_estudio_result);
		$num_estudio = $id_estudio['id'];

		$user_query = "SELECT * FROM usuarios WHERE nombre = '$name' AND email = '$email';";
		$user_result = mysqli_query($conexion, $user_query);
		$num_users = mysqli_num_rows($user_result);

		// Escaping php variables
		if($num_users==0)
		{
			$name = mysqli_real_escape_string($conexion, $name);
			$email = mysqli_real_escape_string($conexion, $email);
			$pswd = mysqli_real_escape_string($conexion, $pswd);

			//echo "$id_estudio";
			echo "$name";
			echo "$email";
			echo "$pswd";
			echo "$value";

			$user_query = "INSERT INTO `usuarios` (`id_Estudio`, `nombre`, `email`, `password`, `admin`) VALUES ('$num_estudio', '$name', '$email', '$pswd', '$value');";
			// De haber tiempo, encriptar contraseña con biblioteca libsodium
			mysqli_real_query($conexion, $user_query);
			if($user_query)
			{
				echo "La inserción ha resultado exitosa";
				header("Location: Login.html");
			}
			else
				echo "<script>alert('Algo falla en la consulta');window.location='crear_usuario.php';</script>";
		}
		else
		{
			echo "<script>alert('Ese usuario ya estaba registrado');window.location='crear_usuario.php';</script>";
		}

		mysqli_close($conexion);
	}
	/*
	else
		header("Location: crear_usuario.php");
	*/

	// Para dejar el autoincrement en el proximo valor
	// Alter table $tabla autoincrement = $nuevo_valor;

?>
</body>
</html>
