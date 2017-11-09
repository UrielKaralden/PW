<?php
	$option=$_POST['auxmin'];
	if($option=='modificar'){
		echo"
		<form method=\"POST\" action=\"crear_seccion.php\">
			<input type=\"hidden\" name=\"id_Encuesta\" value=$_POST['id_Encuesta'] />
		</form>
		";
		exit();
	}else{
		if($option=='crear'){
			header("Location: crear_encuesta.php");
			exit();
		}
		else{
			if($option=='eliminar'){
				$varConn = mysqli_connect('localhost','root','','Encuesta_profesorado')
			    or die("Error al conectar " . mysqli_error());
				for($iter_bucle = 0; $iter_bucle < $num_encuestas; ++$iter_bucle)
                {
					$result=mysqli_query("SELECT * from secciones where id='$iter_bucle' AND id_Encuesta='$iden'");
					echo"<form method=\"POST\" action=\"Modsec.php\">
					<input type=\"hidden\" name=\"nsection\" value=\"$row['nombre']\"/>
					<input type=\"hidden\" name=\"modcre\" value=\"Eliminar\"/>
					<input type=\"hidden\" name=\"iden\" value=$_POST['id_Encuesta'] />";
				}
			}else{
				echo"<script>alert('Opcion no válida');window.location='Login.html';</script>";
				exit();
			}
		}
	}
	
?>