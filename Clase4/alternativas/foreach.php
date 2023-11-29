<?php $frutas = array('Manzana', 'Plátano', 'Fresa', 'Uva'); ?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejemplo de Foreach en HTML</title>
</head>
<body>

    <h1>Listado de Frutas</h1>

    <ul>
        <?php foreach ($frutas as $fruta): ?>
            <li><?php echo $fruta; ?></li>
        <?php endforeach; ?>
    </ul>

</body>
</html>