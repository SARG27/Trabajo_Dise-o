<?php include("conexion.php"); ?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Listado de Estudiantes</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <!-- Bloque card -->
        <div class="card shadow">
            <div class="card-body">
                <h1 class="card-title mb-4 text-center">Listado de Estudiantes</h1>

                <div class="mb-3 text-end">
                    <a href="crear.php" class="btn btn-success">
                        ➕ Agregar Nuevo Estudiante
                    </a>
                </div>

                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover text-center">
                        <thead class="table-primary">
                            <tr>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Edad</th>
                                <th>Grado</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $sql = "SELECT * FROM estudiantes";
                            $resultado = $conexion->query($sql);
                            while ($fila = $resultado->fetch_assoc()) {
                                echo "<tr>
                                        <td>{$fila['id']}</td>
                                        <td>{$fila['nombre']}</td>
                                        <td>{$fila['edad']}</td>
                                        <td>{$fila['grado']}</td>
                                        <td>
                                            <a href='editar.php?id={$fila['id']}' class='btn btn-warning btn-sm me-2'>✏️ Editar</a>
                                            <a href='eliminar.php?id={$fila['id']}' class='btn btn-danger btn-sm'>🗑️ Eliminar</a>
                                        </tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS Bundle (opcional para componentes interactivos) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>