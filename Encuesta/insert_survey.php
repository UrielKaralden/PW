<?php
    // Resolución del formulario de la encuesta
    session_start();
    $name = $_POST['nombre'];
    $desc = $_POST['descripcion'];
    $estudio = $_SESSION['estudio'];

    $conexion = mysqli_connect('localhost',"root","",'Encuesta_profesorado')
        or die("Error al conectar " . mysqli_error());

    $insertar_encuesta = "INSERT INTO Encuestas (nombre,descripcion,id_Estudio) VALUES
    ('$name', '$descripcion', '$estudio');";

    mysqli_query($conexion, $insertar_encuesta);
    header("Location: select_encuesta.php");

    mysqli_close($conexion);
?>
