<?php
	$nombre=$_POST['nsection'];
	$action=$_POST['modcre'];
<<<<<<< HEAD
	if(empty($nombre) && empty($action))
	{
=======
	$identificator=$_POST['iden'];
	if(empty($nombre) && empty($action)){
>>>>>>> 86c7ac6237c18d18a2f17d3343e121f6f477afdf
		echo"<script>alert('Campos Vacios');window.location='crear_seccion.php';</script>";
		exit();
	}
	else
	{
		mysqli_connect('localhost','root','','Encuesta_profesorado')or die("Error al conectar " . mysqli_error());
<<<<<<< HEAD
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
=======
		if($action=="Modificar"){
			$result=mysqli_query("SELECT * from seccion where nombre='$nombre' and id_Encuesta='$iden'");
			if($row=$mysqli_fecth_array($result)){
				 echo "<form action = \"pregunta_encuesta.php\" method = \"POST\">
				<input type = \"hidden\" name = \"id_section\" value = \"$row['id']\"><br>
				</form>";
				exit();
			}else{
				echo"<script>alert('No existe seccion');window.location='crear_seccion.php';</script>";
				exit();
			}
		}else{
			if($action=="Crear"){
				$result = mysqli_query("INSERT INTO seccion(id,nombre,id_Encuesta) VALUES('', '$nombre','$identificator')");
				if($result)
					echo"<script>alert('Exito al crear');window.location='crear_seccion.php';</script>";
				else
					echo"<script>alert('Ha ocurrido un error, vuelva a intentarlo');window.location='crear_seccion.php';</script>";
>>>>>>> 86c7ac6237c18d18a2f17d3343e121f6f477afdf
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