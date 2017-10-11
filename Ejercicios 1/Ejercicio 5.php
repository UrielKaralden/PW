<html>
    <head>
        <title="Ejercicio 5"> </title>
    </head>

    <body>
        <h1> Tabla de 10 x 10 </h1>
        <!--<div align=center>  Alineamiento central en HTML -->
            <?php
            echo "<table border = 1>\n";
            echo "<div align=center>\n";
            define("TAM",10);
            for($i = 0; $i < TAM; ++$i)
            {
                if($i%2==0)
                    echo "<tr bgcolor=#bdc3d6>\n";
                else
                {
                    echo "<tr>\n";
                }
                for($j = 0; $j < TAM; ++$j)
                {
                    echo ("<td>".(TAM*$i+$j+1)."</td>\n");
                }
                echo "</tr>\n";
            }
            echo "</table>";
            ?>
        </div><br>

    </body>
</html>
