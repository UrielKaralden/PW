<?php
	$nombre=$_POST['nquestion'];
	$tipo=$_POST['typequestion'];
	$action=$_POST['modcre'];
	$identificator=$_POST['iden'];
	$description =$_POST['description'];
	if(empty($nombre) && empty($action) && empty($tipo)){
		echo"<script>alert('Campos Vacios');window.location='crear_seccion.php';</script>";
		exit();
	}
	else{
		$conexion = mysqli_connect('localhost','root','','Encuesta_profesorado')or die("Error al conectar " . mysqli_error());
		if($action=="Modificar"){
			$result=mysqli_query("SELECT * from preguntas where nombre='$nombre' and id_Encuesta='$iden'");
			if($row=$mysqli_fecth_array($result)){
                // HACER UPDATE
				$columna = $_POST['col_mod'];
                $modificacion = $_POST['modification'];
				exit();
			}else{
				echo"<script>alert('No existe seccion');window.location='crear_seccion.php';</script>";
				exit();
			}
		}else{
			if($action=="Crear")
			{
				if($tipo == 'radio')
				{
                // Obtención de las respuestas de los radios
					$r1 = $_POST['resp_1'];
					$r2 = $_POST['resp_2'];
					$r3 = $_POST['resp_3'];
					$r4 = $_POST['resp_4'];
					$r5 = $_POST['resp_5'];
					$r6 = $_POST['resp_6'];

					$id_query = "Select max(id) from radio_respuestas;";
					++$id_query;

					$idp_query = "Select max(id) from preguntas;"
					$id_Pregunta = mysqli_query($conexion, $idp_query);
					++$id_Pregunta;

					if(!(empty($r1))
					{
						$r1_query = "INSERT INTO radio_respuestas(id, id_Pregunta, respuesta) VALUES ($id_query, $id_Pregunta, $r1)";
						$radio_query = mysqli($conexion, $r1_query);
						++$id_query;
					}
					if(!(empty($r2))
					{
						$r2_query = "INSERT INTO radio_respuestas(id, id_Pregunta, respuesta) VALUES ($id_query, $id_Pregunta, $r2)";
						$radio_query = mysqli($conexion, $r2_query);
						++$id_query;
					}

					if(!(empty($r3))
					{
						$r3_query = "INSERT INTO radio_respuestas(id, id_Pregunta, respuesta) VALUES ($id_query, $id_Pregunta, $r3)";
						$radio_query = mysqli($conexion, $r3_query);
						++$id_query;
					}

					if(!(empty($r4))
					{
						$r4_query = "INSERT INTO radio_respuestas(id, id_Pregunta, respuesta) VALUES ($id_query, $id_Pregunta, $r4)";
						$radio_query = mysqli($conexion, $r4_query);
						++$id_query;
					}

					if(!(empty($r5))
					{
						$r5_query = "INSERT INTO radio_respuestas(id, id_Pregunta, respuesta) VALUES ($id_query, $id_Pregunta, $r5)";
						$radio_query = mysqli($conexion, $r5_query);
						++$id_query;
					}

					if(!(empty($r6))
					{
						$r6_query = "INSERT INTO radio_respuestas(id, id_Pregunta, respuesta) VALUES ($id_query, $id_Pregunta, $r6)";
						$radio_query = mysqli($conexion, $r6_query);
						++$id_query;
					}
				}

				if(empty($id_Pregunta))
				{
					$idp_query = "Select max(id) from preguntas;"
					$id_Pregunta = mysqli_query($conexion, $idp_query);
					++$id_Pregunta;
				}

				$insert_pregunta = "INSERT INTO preguntas('id', 'id_Secciones', 'tipo_pregunta', 'pregunta', 'descripcion')
					VALUES ("$id_Pregunta", "$identificator", "$tipo", "$nquestion", "$description");";

				$result = mysqli_query($conexion, $insert_pregunta) ;

				if($result)
					echo"<script>alert('Exito al crear');window.location='crear_seccion.php';</script>";
				else
					echo"<script>alert('Ha ocurrido un error, vuelva a intentarlo');window.location='crear_seccion.php';</script>";
			}
			else{
				echo"<script>alert('Esa opcion no existe');window.location='crear_seccion.php';</alert>";
				exit();
			}
		}
	}
?>
