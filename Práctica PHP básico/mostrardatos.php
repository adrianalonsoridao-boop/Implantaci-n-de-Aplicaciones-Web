<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mostrar Datos</title>
</head>
<body>
    <?php
        $archivo = 'datos.txt';

        $fd = fopen($archivo, "r");
            echo "Listado de alumnos: <br>";

            while(!feof($fd)){
                $lectura  = fgets($fd);
                echo $lectura."<br>";
            }
            fclose($fd);
    ?>
</body>
</html>