<html>
    <head>
        <title="Ejercicio 6"> </title>
    </head>

    <body>
        <h1> Potencias </h1>
        <!--<div align=center>  Alineamiento central en HTML -->
            <?php

            define("TAM", 4);
            function potencia ($base, $exp)
            {
                $res = 1;
                for($i = 0; $i < $exp; ++$i)
                {
                    $res = $res * $base;
                }
                return $res;
            }

            echo "<table border = 1>\n";
            echo "<div align=center>\n";
            for($i = 1; $i < TAM+1; ++$i)
            {
                for($j = 1; $j < TAM+1; ++$j)
                {
                    echo ("<td>".potencia($i,$j)."</td>\n");
                }
                echo "</tr>\n";
            }
            echo "</table>";
            ?>
        </div><br>

    </body>
</html>
