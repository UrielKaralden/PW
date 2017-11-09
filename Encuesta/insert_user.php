<html>
<head>
	<title>Insertar Usuarios</title>
</head>
<body>
<?php
    error_reporting(E_ALL & ~E_NOTICE);
    // Resolución del formulario de la encuesta
    session_start();
    $name = $_POST['nombre'];
    $pswd = $_POST['password'];

    if (empty($name) && empty($pswd))
    {
	    echo"<script>alert('ERES INUTIL. APRENDE A ESCRIBIR');window.location='crear_usuario.php';</script>";
	}
    $conexion = mysqli_connect('localhost',"root","",'Encuesta_profesorado') or die("Error al conectar " . mysqli_error());
    mysqli_set_charset($conexion,"utf8");
    if($name == 'admin')
        $user_query = "INSERT INTO usuarios (nombre, password, admin) VALUES ('$name', '$pswd', 1);";
    else
        $user_query = "INSERT INTO usuarios (nombre, password, admin) VALUES ('$name', '$pswd', 0);";
    mysqli_query($conexion, $user_query);

    header("Location: Login.html");
?>
</body>
</html>
