<?php
	$usuario=$_POST['user'];
	$pswd=$_POST['passwd'];

	if ($usuario == null) :
		echo "error";
	endif;

	$pswdHash = password_hash($pswd, PASSWORD_BCRYPT); // pswdHash = contraseña encriptada
	if(empty($usuario) && empty($pswd))
	{
		header("Location: Login2.html");
		exit();
	}

	$varConn = mysqli_connect('localhost','root','','Encuesta_profesorado')
			   or die("Error al conectar " . mysqli_error());
	
	$query = "SELECT * FROM usuarios WHERE user = '$usuario'";

	$result = (mysqli_query($varConn, $query);

	if($row=$mysqli_fecth_array($result)){
		if($row['password']==$pswdHash){
			session_start();
			$_SESSION['usuario']=$usuario;
			$_SESSION['admin']=$row['admin'];
			$_SESSION['id_Estudio']=$row['id_Estudio'];
			header("Location: select_encuesta.php");
		}else{
			echo "Fuera Invasor";
			header("Location: Login2.html");
			exit();
		}
	}else{
		echo "Fuera Invasor";
		header("Location: Login2.html");
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
			echo "Fuera Invasor";
			header("Location: Login2.html");
			exit();
		}
	}else{
		echo "Fuera Invasor";
		header("Location: Login2.html");
		exit();
	}*/

?>
