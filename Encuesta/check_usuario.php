<?php
	session_start();
	$conexion = mysqli_connect('localhost',"root","",'Encuesta_profesorado') or die("Error al conectar " . mysqli_error());

	$nameErr = $emailErr = $pswdErr = "";
	$usuario = $email = $pswd = "";
	if ($_SERVER["REQUEST_METHOD"]=="POST")
	{
		if(empty($_POST['user']))
			$nameErr = "El campo Usuario es obligatorio";
		else
			$usuario = test_input($_POST['user']);

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

	// Redireccion si los campos se encuentran vacíos
	if(empty($usuario) && empty($pswd))
	{
		 echo"<script>alert('Lamentamos informarle de que no ha rellenado todos los campos.\nPor favor, rellene todos los campos');window.location='Login.php';</script>";
	}

	$query = "SELECT * FROM usuarios WHERE nombre = '$usuario';";
	$result = mysqli_query($conexion, $query);
	$users =  mysqli_fetch_assoc($result);
	$user_data = $users['nombre'];
	if($user_data == $usuario)
	{
		echo "EL USUARIO ES CORRECTO, MOTHERFUCKER";
		echo "<br><br>";


		if(password_verify($pswd, $users['password']))
		{
			//echo " LA CONTRASEÑA ES CORRECTA, MOTHERFUCKER";
			$_SESSION['usuario']=$users['nombre'];
			$_SESSION['admin']=$users['admin'];
			$_SESSION['estudio']=$users['id_Estudio'];

			header("Location: select_encuesta.php");

		}
		else
		{
			echo " LA CONTRASEÑA NO ES CORRECTA, MOTHERFUCKER \n";
			echo "<br><br>";
			//echo"<script>alert('Fuera Invasor');window.location='Login.html';</script>";
			exit();
		}
	}
	else
	{
		echo "Fuera esssstupido";
		//echo"<script>alert('Fuera Invasor 2');window.location='Login.html';</script>";
		exit();
	}
?>
