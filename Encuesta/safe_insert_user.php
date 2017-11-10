<<html>
<head>
	<title>Insertar Usuarios</title>
</head>
<body>
<?php
    error_reporting(E_ALL & ~E_NOTICE);
	//safe version
    // Resolución del formulario de la encuesta
	// Comprobación de campos obligatorios
	$nameErr = $emailErr = $pswdErr = $estudioErr ="";
	$name = $email = $pswd = "";
	if ($_SERVER["REQUEST_METHOD"]=="POST")
	{
		if(empty($_POST['estudio']))
			$estudioErr = "El campo Contraseña es obligatorio";
		else
			$pswd = test_input($_POST['password']);
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
		$new_user_query = "Select * from usuarios where nombre = $name and email = $email and password = $pswd;";
		$new_user_result = mysqli_query($conexion, $new_user_query);
		if(!($registered_user = mysqli_fetch_field($new_user_result)))
		{
        	$user_query = "INSERT INTO usuarios (nombre, password, email, admin) VALUES ('$name', $pswd, '$email', '$value');";
			// De haber tiempo, encriptar contraseña con biblioteca libsodium
			mysqli_query($conexion, $user_query);
			header("Location: Login.html");
		}
		else
		{
			echo"<script>alert('ESE USUARIO YA HA SIDO REGISTRADO');window.location='crear_usuario.php';</script>";
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
