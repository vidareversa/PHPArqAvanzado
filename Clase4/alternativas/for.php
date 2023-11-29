<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejemplo de For en HTML</title>
</head>
<body>

    <h1>Números del 1 al 5 (for)</h1>

    <ul>
        <?php for ($i = 1; $i <= 5; $i++): ?>
            <li><?php echo $i; ?></li>
        <?php endfor; ?>
    </ul>

</body>
</html>