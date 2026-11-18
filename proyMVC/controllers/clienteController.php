<?php
require_once(__DIR__ . "/../models/Cliente.php");

$cliente = new Cliente();

// Guardar o Actualizar
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $idcliente = $_POST["idcliente"] ?? "";
    $dni       = $_POST["dni"] ?? "";
    $nombres   = $_POST["nombres"] ?? "";
    $apellidos = $_POST["apellidos"] ?? "";
    $telefono  = $_POST["telefono"] ?? "";
    $correo    = $_POST["correo"] ?? "";

    if (empty($idcliente)) {
        $cliente->insert_cliente($dni, $nombres, $apellidos, $telefono, $correo);
    } else {
        $cliente->update_cliente($idcliente, $dni, $nombres, $apellidos, $telefono, $correo);
    }
    header("Location: ../index.php");
    exit();
}

// Eliminar
if (isset($_GET["eliminar"])) {
    $idcliente = $_GET["eliminar"];
    $cliente->delete_cliente($idcliente);
    header("Location: ../index.php");
    exit();
}

// Listar clientes
$lista_clientes = $cliente->get_clientes();

// Cargar datos si se va a editar
$cliente_editar = null;
if (isset($_GET["editar"])) {
    $cliente_editar = $cliente->get_cliente_x_id($_GET["editar"]);
}
?>