<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 4</title>
</head>
<body>
    <?php
      $nombre = trim(strip_tags($_POST["nombre"]));
      $telefono = trim(strip_tags($_POST["telefono"]));
      $trabajo= trim(strip_tags($_POST["trabajo"]));
      $direccion = trim(strip_tags($_POST["direccion"]));
      $otras = trim(strip_tags($_POST["otras"]));
      $archivo = 'contactos.txt';

      if(!file_exists($archivo)){
            fopen($archivo, 'w');
            }
            $file = fopen($archivo, 'a');
            fwrite($file, "Contacto: $nombre $trabajo $telefono $direccion $otros" . PHP_EOL);
            fclose($file);
    ?>
    <form action="contactos.php" method="post">
        <h1>¡Tu contacto ha sido dado de alta con exito!</h1>
            <h2>¿Qué quieres hacer ahora?</h2>
            <select name="datos">
                <option value="1">Buscar Contacto</option>
                <option value="0">Ver Todos los contactos</option>
            </select>
            <button type="submit">select</button>
        </form>
</body>
</html>