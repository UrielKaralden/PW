<?php
    // Iniciar Session
    include "inicio_sesion.php";
    // Abrir mysql
    // Realizar inserciones en la BD
    // $id_Encuesta = variable numerica indicada en la sesión del cliente

    error_reporting(E_ALL & ~E_NOTICE);
    $titulacion = $_REQUEST['titulacion'];
    $asignatura = $_REQUEST['asignatura'];
    $grupo = $_REQUEST['grupo'];

    $titulacion = $_POST['titulacion'];
    $asignatura = $_POST['asignatura'];
    $grupo = $_POST['grupo'];

    $seccion[1][1] = "INSERT INTO respuestas (id_Preguntas, id_Encuestas, respuesta)
    VALUES (1,$id_Encuesta, $titulacion)";
    $seccion[1][2] = "INSERT INTO respuestas (id_Preguntas, id_Encuestas, respuesta)
    VALUES (2,$id_Encuesta, $asignatura)";
    $seccion[1][3] = "INSERT INTO respuestas (id_Preguntas, id_Encuestas, respuesta)
    VALUES (3,$id_Encuesta, $grupo)";

    for($i = 1; $i < 3; ++$i)
    {
        $consulta = mysqli_query ($seccion[1][$i], $conexion)
        or die ("Fallo al introducir el valor de la pregunta $i");
    }
?>
