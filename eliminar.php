<?php include("conexion.php"); ?>

<?php
$id = isset($_GET["id"]) ? intval($_GET["id"]) : 0;

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Confirmación recibida, eliminamos
    $sql = "DELETE FROM estudiantes WHERE id = $id";
    $conexion->query($sql);
    header("Location: index.php");
    exit();
}

// Si no es POST, mostramos el formulario de confirmación
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Confirmar Eliminación</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="card shadow p-4 text-center">
            <h2 class="mb-4">¿Estás seguro de eliminar este estudiante?</h2>
            <form method="post">
                <button type="submit" class="btn btn-danger me-3">Sí, eliminar</button>
                <a href="index.php" class="btn btn-secondary">Cancelar</a>
            </form>
        </div>
    </div>
</body>
</html>