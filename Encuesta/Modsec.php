<?php
	$nombre=$_POST['nsection'];
	$action=$_POST['modcre'];
	if(empty($nombre) && empty($action))
	{
		echo"<script>alert('Campos Vacios');window.location='crear_seccion.php';</script>";
		exit();
	}
	else
	{
		mysqli_connect('localhost','root','','Encuesta_profesorado')or die("Error al conectar " . mysqli_error());
		if($action=="Modificar")
		{
			$result=mysqli_query("SELECT * from seccion where nombre='" . nsection . "'");
			if($row=$mysqli_fecth_array($result))
			{	
			}
			else
			{
				echo"<script>alert('No existe seccion');window.location='crear_seccion.php';</script>";
				exit();
			}
		}
		else
		{
			if($action=="Crear")
			{
				echo"<script>alert('Exito al crear');window.location='crear_seccion.php';</script>";
				exit();
			}
			else
			{
				echo"<script>alert('Esa opcion no existe');window.location='crear_seccion.php';</alert>";
				exit();
			}
		}
	}
?>