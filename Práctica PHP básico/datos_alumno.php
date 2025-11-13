<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Datos Alumno</title>
</head>
<body>
    <?php
      $nombre = trim(strip_tags($_POST["nombre"]));
      $telefono = trim(strip_tags($_POST["telefono"]));
      $ensenanza = trim(strip_tags($_POST["ensenanza"]));
      $matriculado = trim(strip_tags($_POST["matriculado"]));
      $mostrar = trim(strip_tags($_POST["datos"]));
      $archivo = 'datos.txt';

      if($mostrar == "1"){
        if($matriculado == "on"){
            print "El alumno con nombre $nombre, con telefono $telefono está matriculado en $ensenanza";
        }
        else{
            print "El alumno con nombre $nombre, con telefono $telefono no está matriculado";    
        }
      }
      elseif($mostrar == "0"){
        if($matriculado == "on"){
            if(!file_exists($archivo)){
            fopen($archivo, 'w');
            }
            $file = fopen($archivo, 'a');
            fwrite($file, "El alumno con nombre $nombre, con telefono $telefono está matriculado en $ensenanza" . PHP_EOL);
            fclose($file);
        }
        else{
            print "El alumno con nombre $nombre, con telefono $telefono no está matriculado";
        }
      }
    ?>
    <form action="mostrardatos.php" method="post">
        <button type="submit">Mostrar datos</button>
    </form>
</body>
</html>