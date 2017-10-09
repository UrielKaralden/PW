<html>
<head>
    <title="Ejercicio 4"> </title>
</head>

<body>
    <h1> Tabla de 10 x 10 </h1>
    <div align=center>
<?php
    $tabla = array();
    for($i = 0; $i < 10; ++$i)
    {
        for($j = 0; $j < 10; ++$j)
        {
            $tabla[$i][$j] = $i*10+$j;
        }
    }
    for($i = 0; $i < 10; ++$i)
    {
        print_r($tabla[$i]);
        print "<br>";
    }

 ?>
 </div><br>

</body>
</html>
