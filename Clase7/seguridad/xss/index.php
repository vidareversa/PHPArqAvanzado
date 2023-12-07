<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario Simple</title>
</head>
<body>
    <h1>Formulario Simple</h1>
    
    <form action="procesador.php" method="post">
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" required>

        <label for="email">Correo Electrónico:</label>
        <input type="email" id="email" name="email" required>

        <label for="mensaje">Mensaje:</label>
        <textarea id="mensaje" name="mensaje" required></textarea>

        <input type="submit" value="Enviar">
    </form>

    <h2>Registros Cargados</h2>
    
    <?php
    
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "prueba";

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Conexión fallida: " . $conn->connect_error);
        }

        $sql = "SELECT * FROM mensajes";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            echo "<table border='1'>";
            echo "<tr><th>ID</th><th>Nombre</th><th>Correo Electrónico</th><th>Mensaje</th><th>Fecha Creación</th></tr>";

            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["id"] . "</td>";
                echo "<td>" . $row["nombre"] . "</td>";
                echo "<td>" . $row["email"] . "</td>";
                echo "<td>" . $row["mensaje"] . "</td>";
                echo "<td>" . $row["fecha_creacion"] . "</td>";
                echo "</tr>";
            }

            echo "</table>";
        } else {
            echo "No hay registros cargados.";
        }

        $conn->close();
    ?>
</body>
</html>