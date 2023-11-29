<?php $dia = 'lunes'; ?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejemplo de Switch en HTML</title>
</head>
<body>

    <h1>Día de la Semana</h1>

    <?php switch ($dia): ?>
        <?php case 'lunes': ?>
            <p>Es el comienzo de la semana.</p>
            <?php break; ?>
        <?php case 'viernes': ?>
            <p>¡Viernes al fin!</p>
            <?php break; ?>
        <?php default: ?>
            <p>No es lunes ni viernes.</p>
    <?php endswitch; ?>

</body>
</html>