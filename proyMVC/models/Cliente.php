<?php
require_once(__DIR__ . "/../config/conexion.php");

class Cliente extends Conectar {

    // 1. LISTAR TODOS LOS CLIENTES
    public function get_clientes() {
        $conectar = parent::conexion();
        $sql = "SELECT * FROM tcliente ORDER BY idcliente DESC";
        $stmt = sqlsrv_query($conectar, $sql);
        $datos = [];
        if ($stmt) {
            while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
                $datos[] = $row;
            }
        }
        return $datos;
    }

    // 2. OBTENER UN SOLO CLIENTE POR ID (Para editar)
    public function get_cliente_x_id($idcliente) {
        $conectar = parent::conexion();
        $sql = "SELECT * FROM tcliente WHERE idcliente = ?";
        $params = array($idcliente);
        $stmt = sqlsrv_query($conectar, $sql, $params);
        if ($stmt) {
            return sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);
        }
        return null;
    }

    // 3. INSERTAR NUEVO CLIENTE
    public function insert_cliente($dni, $nombres, $apellidos, $telefono, $correo) {
        $conectar = parent::conexion();
        $sql = "INSERT INTO tcliente (dni, nombres, apellidos, telefono, correo) VALUES (?, ?, ?, ?, ?)";
        $params = array($dni, $nombres, $apellidos, $telefono, $correo);
        return sqlsrv_query($conectar, $sql, $params);
    }

    // 4. ACTUALIZAR CLIENTE
    public function update_cliente($idcliente, $dni, $nombres, $apellidos, $telefono, $correo) {
        $conectar = parent::conexion();
        $sql = "UPDATE tcliente SET dni = ?, nombres = ?, apellidos = ?, telefono = ?, correo = ? WHERE idcliente = ?";
        $params = array($dni, $nombres, $apellidos, $telefono, $correo, $idcliente);
        return sqlsrv_query($conectar, $sql, $params);
    }

    // 5. ELIMINAR CLIENTE
    public function delete_cliente($idcliente) {
        $conectar = parent::conexion();
        $sql = "DELETE FROM tcliente WHERE idcliente = ?";
        $params = array($idcliente);
        return sqlsrv_query($conectar, $sql, $params);
    }
}
?>