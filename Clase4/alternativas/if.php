<?php $edad = 25; ?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejemplo de If en HTML</title>
</head>
<body>

    <h1>Verificación de Edad</h1>

    <?php if ($edad >= 18): ?>
        <p>Eres mayor de edad.</p>
    <?php else: ?>
        <p>Eres menor de edad.</p>
    <?php endif; ?>

</body>
</html>
