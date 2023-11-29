<?php
// Datos en un array
$datos = array(
    'nombre' => 'Juan',
    'edad' => 25,
    'ciudad' => 'EjemploCity'
);

// Utilizar extract() para importar variables al ámbito actual
extract($datos);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comunicación PHP - HTML</title>
</head>
<body>

    <h1>Información del Usuario</h1>
    
    <!-- Utilizar las variables en HTML -->
    <p>Nombre: <?php echo $nombre; ?></p>
    <p>Edad: <?php echo $edad; ?></p>
    <p>Ciudad: <?php echo $ciudad; ?></p>

</body>
</html>