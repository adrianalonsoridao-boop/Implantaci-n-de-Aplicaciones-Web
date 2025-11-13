<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contactos</title>
</head>
<body>
    <?php
      $nombre = trim(strip_tags($_POST["nombre"]));
      $telefono = trim(strip_tags($_POST["telefono"]));
      $trabajo= trim(strip_tags($_POST["trabajo"]));
      $direccion = trim(strip_tags($_POST["direccion"]));
      $otras = trim(strip_tags($_POST["otras"]));
      $archivo = 'contactos.txt';
      $mostrar = trim(strip_tags($_POST["datos"]));

      if($mostrar == 0){
        $fd = fopen($archivo, "r");
            echo "<h1>Listado de contactos:</h1><br>";

            while(!feof($fd)){
                $lectura  = fgets($fd);
                echo $lectura."<br>";
            }
            fclose($fd);
      }
      elseif($mostrar == 1){
        ?>
        <h2>Buscar Contacto</h2>
            <form action="busqueda.php" method="post">
                Introduzca el nombre a buscar: 
                <input type="text" name="nombre_busqueda">
                <button type="submit">Buscar ahora</button>
            </form>
            <?php
        }
    ?>
</body>
</html>