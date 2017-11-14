<script type="text/javascript" src="fusioncharts/js/fusioncharts.js"></script>
<script type="text/javascript" src="fusioncharts/js/themes/fusioncharts.theme.fint.js"></script>

<?php
	session_start();
	$conexion = mysqli_connect('localhost',"root","",'Encuesta_profesorado') 
						or die("Error al conectar " . mysqli_error());
?>

<html>
	<head>
		<title>Informe</title>
		<script src="fusioncharts/fusioncharts.js"></script>
	</head>

   <body>
  	<?php
  		include("fusioncharts.php");
  		
  		$asignatura = $_POST['asignatura'];
     	
     	// Sexo
     	$strQuery = "SELECT count(*) AS total, respuesta
     				 FROM Respuestas
					 WHERE Id_Encuesta = 2
					 AND id_pregunta = 8
					 AND Id_Usuario IN
					 	(SELECT Id_Usuario
					 	 FROM Respuestas
					 	 WHERE Id_Encuesta = 2
					 	 AND id_pregunta = 2
					 	 AND respuesta = '$asignatura')
					 GROUP BY respuesta";

		$result = mysqli_query($conexion, $strQuery) or exit("Error code ({$conexion->errno}): {$conexion->error}");

		if ($result) 
     	{
        	$arrData = array(
        	    "chart" => array(
                  "caption" => "Distribución por género",
                  "showValues" => "0",
                  "theme" => "flint"
              	)
           	);

        	$arrData["data"] = array();
	
	    	while($row = mysqli_fetch_array($result)) 
	    	{
	           	array_push($arrData["data"], array(
	              	"label" => $row["respuesta"],
	              	"value" => $row["total"]
	              	)
	           	);
        	}
        	$jsonEncodedData = json_encode($arrData);

			$columnChart = new FusionCharts("column2D", "Distribución por género" , 600, 300, "chart-1", "json", $jsonEncodedData);

        	$columnChart->render();
        }

        // Edad
     	$strQuery = "SELECT count(*) AS total, respuesta
     				 FROM Respuestas
					 WHERE Id_Encuesta = 2
					 AND id_pregunta = 7
					 AND Id_Usuario IN
					 	(SELECT Id_Usuario
					 	 FROM Respuestas
					 	 WHERE Id_Encuesta = 2
					 	 AND id_pregunta = 2
					 	 AND respuesta = '$asignatura')
					 GROUP BY respuesta";

		$result = mysqli_query($conexion, $strQuery);

     	if ($result) 
     	{
        	$arrData = array(
        	    "chart" => array(
                  "caption" => "Distribución por edad",
                  "showValues" => "0",
                  "theme" => "flint"
              	)
           	);

        	$arrData["data"] = array();

	    	while($row = mysqli_fetch_array($result)) {
           	array_push($arrData["data"], array(
              	"label" => $row["respuesta"],
              	"value" => $row["total"]
              	)
           	);
        	}
        	$jsonEncodedData = json_encode($arrData);

			$columnChart = new FusionCharts("column2D", "Distribución por edad" , 600, 300, "chart-1", "json", $jsonEncodedData);

        	// Render the chart
        	$columnChart->render();
        }

        // Matriculaciones
     	$strQuery = "SELECT count(*) AS total, respuesta
     				 FROM Respuestas
					 WHERE Id_Encuesta = 2
					 AND id_pregunta = 7
					 AND Id_Usuario IN
					 	(SELECT Id_Usuario
					 	 FROM Respuestas
					 	 WHERE Id_Encuesta = 2
					 	 AND id_pregunta = 2
					 	 AND respuesta = '$asignatura')
					 GROUP BY respuesta";

		$result = mysqli_query($conexion, $strQuery);

     	if ($result) {
        	$arrData = array(
        	    "chart" => array(
                  "caption" => "Distribución por matriculaciones",
                  "showValues" => "0",
                  "theme" => "flint"
              	)
           	);

        	$arrData["data"] = array();

	    	while($row = mysqli_fetch_array($result)) {
           	array_push($arrData["data"], array(
              	"label" => $row["respuesta"],
              	"value" => $row["total"]
              	)
           	);
        	}
        	$jsonEncodedData = json_encode($arrData);

			$columnChart = new FusionCharts("column2D", "Distribución por matriculaciones" , 600, 300, "chart-1", "json", $jsonEncodedData);

        	// Render the chart
        	$columnChart->render();


        	// Close the database connection
        	$conexion->close();
     	}
  	?>

  	<div id="chart-1"><!-- Fusion Charts will render here--></div>

   </body>

</html>