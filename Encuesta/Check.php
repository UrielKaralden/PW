<?php
	$usuario=$_POST['user'];
	$pswd=$_POST['passwd'];
	if(empty($usuario) && empty($pass)){
		header("Location: Login2.html");
		exit();
	}

	mysqli_connect('localhost','root','','Encuesta_profesorado')or die("Error al conectar " . mysqli_error());

	$result=mysqli_query("SELECT * from usuarios where user='" . $usuario . "'");
	if($row=$mysqli_fecth_array($result)){
		if($row['password']==$pswd){
			session_start();
			$_SESSION['usuario']=$usuario;
			$_SESSION['password']=$pswd;
			$_SESSION['admin']=false;
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
	mysqli_connect('localhost','root','','Encuesta_profesorado')or die("Error al conectar " . mysqli_error());

	$result=mysqli_query("SELECT * from admin where user='" . $usuario . "'");
	if($row=$mysql_fecth_array($result)){
		if($row['password']==$pswd){
			session_start();
			$_SESSION['usuario']=$usuario;
			$_SESSION['password']=$pswd;
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
	}
?>
