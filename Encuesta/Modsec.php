<?php
	$nombre=$_POST['nsection'];
	$action=$_POST['modcre'];
	$identificator=$_POST['iden'];
	if(empty($nombre) && empty($action)){
		echo"<script>alert('Campos Vacios');window.location='crear_seccion.php';</script>";
		exit();
	}
	else{
		mysqli_connect('localhost','root_encuesta','encuesta_root','Encuesta_profesorado')or die("Error al conectar " . mysqli_error());
		if($action=="Modificar"){
			$result=mysqli_query("SELECT * from secciones where nombre='$nombre' and id_Encuesta='$identificator'";);
			if($row=$mysqli_fecth_array($result)){
				 echo "<form action = \"crear_pregunta.php\" method = \"POST\">
				<input type = \"hidden\" name = \"id_section\" value = \"$row['id']\"><br>
				</form>";
				exit();
			}else{
				echo"<script>alert('No existe seccion');window.location='crear_seccion.php';</script>";
				exit();
			}
		}else{
			if($action=="Crear"){
				$result = mysqli_query("INSERT INTO secciones(id,nombre,id_Encuesta) VALUES('', '$nombre','$identificator');");
				if($result)
					echo"<script>alert('Exito al crear');window.location='crear_seccion.php';</script>";
				else
					echo"<script>alert('Ha ocurrido un error, vuelva a intentarlo');window.location='crear_seccion.php';</script>";
				exit();
			}else{
				if($action=="Eliminar"){
					$aux=mysqli_query("SELECT * from secciones where id_Encuesta='identificator'";);
					if($row=$mysqli_fecth_array($result)){
						$identificador=$row['id'];
						for($iter_bucle = 0; $iter_bucle < $num_encuestas; ++$iter_bucle)
						{
							$result=mysqli_query("SELECT * from preguntas where id='$iter_bucle' AND id_Seccion='$identificador'";);
							if($row2=$mysqli_fetch_array($result))
							echo"<form method=\"POST\" action=\"ModPreg.php\">
							<input type=\"hidden\" name=\"nquestion\" value=$row2['nombre']/>
							<input type=\"hidden\" name=\"typequestion\" value=$row2['tipo_pregunta']/>
							<input type=\"hidden\" name=\"modcre\" value=\"Eliminar\"/>
							<input type=\"hidden\" name=\"iden\" value=$identificador />";
						}
						$result=mysqli_query("DELETE FROM secciones where id='$identificador'");
						if($result)
							echo"<script>alert('Exito al eliminar');window.location='crear_seccion.php';</script>";
						else
							echo"<script>alert('Ha ocurrido un error, vuelva a intentarlo');window.location='crear_seccion.php';</script>";
						exit();
					}else{
						echo"<script>alert('Ha ocurrido un error, vuelva a intentarlo');window.location='crear_seccion.php';</alert>";
						exit();
					}
				}else{
					echo"<script>alert('Esa opcion no existe');window.location='crear_seccion.php';</alert>";
					exit();
				}
			}
		}
	}
?>
