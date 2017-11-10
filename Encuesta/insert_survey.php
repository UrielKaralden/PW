<?php
    // Resolución del formulario de la encuesta
    session_start();
    $name = $_POST['nombre'];
    $desc = $_POST['descripcion'];
    $estudio = $_SESSION['estudio'];
    if($_SESSION['admin'] == true)
        $user = 'encuesta_root';
        $pass = "root_encuesta";
    else
    {
        $user = 'cursophp';
        $pass = "";
    }
    $conexion = mysqli_connect('localhost',"$user",
        "$pass",'Encuesta_profesorado')
        or die("Error al conectar " . mysqli_error());

    $insertar_encuesta = "INSERT INTO Encuestas (id,nombre,descripcion,id_Estudio) VALUES
    ('', $name, $descripcion, $estudio);";

    $resultado = mysqli_query($conexion, $insertar_encuesta);
    echo"header(\"Location: index.php\")";
?>
