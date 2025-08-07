<?php include("conexion.php"); ?>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST["nombre"];
    $edad = $_POST["edad"];
    $grado = $_POST["grado"];
    
    if (!empty($nombre) && !empty($edad) && !empty($grado)) {
        $sql = "INSERT INTO estudiantes (nombre, edad, grado) VALUES ('$nombre', $edad, '$grado')";
        $conexion->query($sql);
        header("Location: index.php");
    } else {
        echo "<div class='alert alert-danger'>⚠️ Por favor, completa todos los campos.</div>";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Agregar Estudiante</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="estilos.css">
</head>
<body>
<div class="container">
    <h1>➕ Agregar Estudiante</h1>
    <form method="post">
        <div class="mb-3">
            <label class="form-label">Nombre:</label>
            <input type="text" name="nombre" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Edad:</label>
            <input type="number" name="edad" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Grado:</label>
            <input type="text" name="grado" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Guardar</button>
        <a href="index.php" class="btn btn-secondary">Volver</a>
    </form>
</div>
</body>
</html>