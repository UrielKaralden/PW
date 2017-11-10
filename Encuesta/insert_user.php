<html>
<head>
	<title>Insertar Usuarios</title>
</head>
<body>
<?php
    error_reporting(E_ALL & ~E_NOTICE);
    // Resolución del formulario de la encuesta

	// Comprobación de campos obligatorios
	$nameErr = $emailErr = $pswdErr = "";
	$name = $email = $pswd = "";
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
	}

	function test_input($data)
	{
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}

    if (empty($name) && empty($email) && empty($pswd))
	    echo"<script>alert('ERES INUTIL. APRENDE A ESCRIBIR');window.location='crear_usuario.php';</script>";
	else
	{
    	if($name == 'admin')
			$value = 1;
		else
			$value = 0;

		session_start();
		$conexion = mysqli_connect('localhost',"root","",'Encuesta_profesorado') or die("Error al conectar " . mysqli_error());
		mysqli_set_charset($conexion,"utf8");
        $user_query = "INSERT INTO usuarios (nombre, password, email, admin) VALUES ('$name', $pswd, '$email', '$value');";
		// De haber tiempo, encriptar contraseña

		mysqli_query($conexion, $user_query);
		header("Location: Login.html");
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
