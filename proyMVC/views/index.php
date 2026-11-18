<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>CRUD Clientes - PHP & SQL Server</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5">
    <h2 class="mb-4 text-center">Gestión de Clientes </h2>

    <!-- FORMULARIO CREAR / EDITAR -->
    <div class="card mb-4 shadow-sm">
        <div class="card-header bg-primary text-white">
            <?= $cliente_editar ? "Editar Cliente" : "Nuevo Cliente" ?>
        </div>
        <div class="card-body">
            <form action="controllers/clienteController.php" method="POST" class="row g-3">
                <input type="hidden" name="idcliente" value="<?= $cliente_editar['idcliente'] ?? '' ?>">
                
                <div class="col-md-2">
                    <label class="form-label">DNI</label>
                    <input type="text" name="dni" maxlength="8" pattern="\d{8}" class="form-control" required value="<?= $cliente_editar['dni'] ?? '' ?>">
                </div>
                <div class="col-md-3">
                    <label class="form-label">Nombres</label>
                    <input type="text" name="nombres" class="form-control" required value="<?= $cliente_editar['nombres'] ?? '' ?>">
                </div>
                <div class="col-md-3">
                    <label class="form-label">Apellidos</label>
                    <input type="text" name="apellidos" class="form-control" required value="<?= $cliente_editar['apellidos'] ?? '' ?>">
                </div>
                <div class="col-md-2">
                    <label class="form-label">Teléfono</label>
                    <input type="text" name="telefono" maxlength="15" class="form-control" value="<?= $cliente_editar['telefono'] ?? '' ?>">
                </div>
                <div class="col-md-2">
                    <label class="form-label">Correo</label>
                    <input type="email" name="correo" class="form-control" value="<?= $cliente_editar['correo'] ?? '' ?>">
                </div>

                <div class="col-12">
                    <button type="submit" class="btn btn-success">
                        <?= $cliente_editar ? "Actualizar" : "Guardar" ?>
                    </button>
                    <?php if ($cliente_editar): ?>
                        <a href="index.php" class="btn btn-secondary">Cancelar</a>
                    <?php endif; ?>
                </div>
            </form>
        </div>
    </div>

    <!-- TABLA DE CLIENTES -->
    <div class="card shadow-sm">
        <div class="card-body">
            <table class="table table-striped table-hover align-middle">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>DNI</th>
                        <th>Nombres</th>
                        <th>Apellidos</th>
                        <th>Teléfono</th>
                        <th>Correo</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($lista_clientes as $row): ?>
                    <tr>
                        <td><?= $row['idcliente'] ?></td>
                        <td><?= $row['dni'] ?></td>
                        <td><?= $row['nombres'] ?></td>
                        <td><?= $row['apellidos'] ?></td>
                        <td><?= $row['telefono'] ?></td>
                        <td><?= $row['correo'] ?></td>
                        <td>
                            <a href="index.php?editar=<?= $row['idcliente'] ?>" class="btn btn-warning btn-sm">Editar</a>
                            <a href="controllers/clienteController.php?eliminar=<?= $row['idcliente'] ?>" 
                               class="btn btn-danger btn-sm" 
                               onclick="return confirm('¿Seguro que deseas eliminar este cliente?')">Eliminar</a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
</body>
</html>