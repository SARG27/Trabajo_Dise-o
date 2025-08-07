<?php include("conexion.php"); ?>

<?php
$id = $_GET["id"];
$sql = "SELECT * FROM estudiantes WHERE id = $id";
$resultado = $conexion->query($sql);
$estudiante = $resultado->fetch_assoc();

$mensaje = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST["nombre"];
    $edad = $_POST["edad"];
    $grado = $_POST["grado"];

    if (!empty($nombre) && !empty($edad) && !empty($grado)) {
        $sql = "UPDATE estudiantes SET nombre='$nombre', edad=$edad, grado='$grado' WHERE id = $id";
        $conexion->query($sql);
        header("Location: index.php");
        exit();
    } else {
        $mensaje = "⚠️ Todos los campos son obligatorios.";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Estudiante</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="card shadow p-4">
        <h2 class="mb-4 text-primary">Editar Estudiante</h2>

        <?php if ($mensaje): ?>
            <div class="alert alert-warning"><?php echo $mensaje; ?></div>
        <?php endif; ?>

        <form method="post">
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre:</label>
                <input type="text" name="nombre" class="form-control" value="<?php echo $estudiante['nombre']; ?>" required>
            </div>

            <div class="mb-3">
                <label for="edad" class="form-label">Edad:</label>
                <input type="number" name="edad" class="form-control" value="<?php echo $estudiante['edad']; ?>" required>
            </div>

            <div class="mb-3">
                <label for="grado" class="form-label">Grado:</label>
                <input type="text" name="grado" class="form-control" value="<?php echo $estudiante['grado']; ?>" required>
            </div>

            <div class="d-flex justify-content-between">
                <button type="submit" class="btn btn-success">Actualizar</button>
                <a href="index.php" class="btn btn-secondary">Cancelar</a>
            </div>
        </form>
    </div>
</div>

</body>
</html>