<html>
	<head>
		<title>
			Almacenamiento de respuestas de las encuestas
		</title>
	</head>
	<body>
		<div>
			<?php
                session_start();
                $conexion = mysqli_connect('localhost',"root","",'Encuesta_profesorado') or die("Error al conectar " . mysqli_error());

                // Obtener el ID de la última respuesta almacenada
                $last_id_query = "Select max(id) from respuestas;";
                $last_id = mysqli_query($conexion, $last_id_query);

                // Como vamos a insertar respuestas, accedemos al siguiente ID
                ++$last_id;

				// Recibimos todas las respuestas en un Array
				$respuestas = $_POST['respuestas[]'];
				$ids_pregunta = $_POST['ids_pregunta[]'];
				$cont_preguntas = count($ids_pregunta);

				for($i = 0; $i < $cont_preguntas; ++$i)
				{
					$answer = $respuestas[$i];
					$id_question = $ids_pregunta[$i];
					$query = "INSERT INTO respuestas(id, id_pregunta, respuesta)
						VALUES ($last_id, $id_question,$answer);";
					$insercion = mysqli_query($conexion, $query);
				}
				echo "Sus respuestas han sido procesadas. Gracias por participar.";

				// Incluir usuario en participantes
            ?>
		</div>
	</body>
</html>
