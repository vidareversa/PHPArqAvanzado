<?php $contador = 1; ?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejemplo de While en HTML</title>
</head>
<body>

    <h1>Números del 1 al 5 (while)</h1>

    <ul>
        <?php while ($contador <= 5): ?>
            <li><?php echo $contador; ?></li>
            <?php $contador++; ?>
        <?php endwhile; ?>
    </ul>

</body>
</html>