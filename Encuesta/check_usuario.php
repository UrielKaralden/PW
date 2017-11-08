<?php
	$usuario=$_POST['user'];
	$pswd=$_POST['passwd'];

	if ($usuario == null) :
		echo "error";
	endif;

	$pswdHash = password_hash($pswd, PASSWORD_BCRYPT); // pswdHash = contraseña encriptada
	
	if(empty($usuario) && empty($pswd)) :
		header("Location: Login2.html");
		exit();
	endif;

	$varConn = mysqli_connect('localhost','root','','Encuesta_profesorado')
			   or die ("Error al conectar " . mysqli_error());
	
	$query = "SELECT * FROM usuarios WHERE user = '$usuario'";
	$result = mysqli_query($varConn, $query);

	if($row = mysqli_fetch_array($result))
	{
		if($row['password']==$pswdHash)
		{
			session_start();
			$_SESSION['usuario']=$usuario;
			$_SESSION['admin']=$row['admin'];
			$_SESSION['id_Estudio']=$row['id_Estudio'];
			header("Location: select_encuesta.php");
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
/*
SELECT * FROM Respuestas
WHERE id_Encuesta = 10
AND id_Preguntas IN
 (SELECT id FROM Preguntas
  WHERE id_Secciones = 15);
*/

?>



