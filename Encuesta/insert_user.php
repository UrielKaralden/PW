<html>
<head>
	<title>Insertar Usuarios</title>
</head>
<body>
<?php
    error_reporting(E_ALL & ~E_NOTICE);
    // Resolución del formulario de la encuesta

	function test_input($data)
	{
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}

    session_start();
	$conexion = mysqli_connect('localhost',"root","",'Encuesta_profesorado') or die("Error al conectar " . mysqli_error());
    mysqli_set_charset($conexion,"utf8");

	$name = test_input($_POST['name']);
	$email = test_input($_POST['email']);
	$pswd = test_input($_POST['password']);

    if (empty($name) || empty($email) || empty($pswd))
    {
	    echo"<script>alert('ERES INUTIL. APRENDE A ESCRIBIR');window.location='crear_usuario.php';</script>";
	}
	else
	{
    	if($name == 'admin')
        	$user_query = "INSERT INTO usuarios (nombre, password, email, admin) VALUES ('$name', '$pswd', '$email', 1);";
    	else
        	$user_query = "INSERT INTO usuarios (nombre, password, email, admin) VALUES ('$name', '$pswd', '$email', 0);";

		$result = mysqli_query($conexion, $user_query);
		mysqli_close($conexion);

		if(isset($result))
			header("Location: Login.html");
	}
	/*
	else
		header("Location: crear_usuario.php");
	*/
?>
</body>
</html>
