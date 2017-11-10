<?php
	/* Inutil encriptar si no se almacena encriptada en la base de datos
	$pswdHash = password_hash($pswd, PASSWORD_BCRYPT); */

	$nameErr = $emailErr = $pswdErr = "";
	$usuario = $email = $pswd = "";
	if ($_SERVER["REQUEST_METHOD"]=="POST")
	{
		if(empty($_POST['nombre']))
			$nameErr = "El campo Usuario es obligatorio";
		else
			$usuario = test_input($_POST['nombre']);

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
		 echo"<script>alert('Lamentamos informarle de que no ha rellenado todos los campos.\nPor favor, rellene todos los campos');window.location='crear_usuario.php';</script>";
		header("Location: Login2.html");
		exit();
	}

	$varConn = mysqli_connect('localhost','root','','Encuesta_profesorado')
			   or die("Error al conectar " . mysqli_error());

	$query = "SELECT * FROM usuarios WHERE user = '$usuario';";

	$result = (mysqli_query($varConn, $query));

	if($row=$mysqli_fecth_array($result)){
		if($row['password']==$pswdHash){
			session_start();
			$_SESSION['usuario']=$usuario;
			$_SESSION['admin']=$row['admin'];
			$_SESSION['id_Estudio']=$row['id_Estudio'];
			header("Location: select_encuesta.php");
/*<<<<<<< HEAD:Encuesta/check_usuario.php
		}
		else
		{
			echo "Fuera Invasor";
			header("Location: Login3.html");
			exit();
		}
	}
	else
	{
		echo "Fuera Invasor";
		header("Location: Login3.html");
		exit();
	}

SELECT * FROM Respuestas
WHERE id_Encuesta = 10
AND id_Preguntas IN
 (SELECT id FROM Preguntas
  WHERE id_Secciones = 15);

=======*/
		}else{
			echo"<script>alert('Fuera Invasor');window.location='Login.html';</script>";
			exit();
		}
	}else{
		echo"<script>alert('Fuera Invasor');window.location='Login.html';</script>";
		exit();
	}
	/*mysqli_connect('localhost','root','','Encuesta_profesorado')or die("Error al conectar " . mysqli_error());

	$result=mysql_query("SELECT * from admin where user='" . $usuario . "'");
	if($row=$mysql_fecth_array($result)){
		if($row['password']==$pswd){
			session_start();
			$_SESSION['usuario']=$usuario;
			$_SESSION['admin']=true;
			header("Location: select_encuesta.php");
		}else{
			echo"<script>alert('Fuera Inavasor');window.location='Login.html';</script>";
			exit();
		}
	}else{
		echo"<script>alert('Fuera Invasor');window.location='Login.html';</script>";
		exit();
	}*/
//>>>>>>> 86c7ac6237c18d18a2f17d3343e121f6f477afdf:Encuesta/Check.php

?>
