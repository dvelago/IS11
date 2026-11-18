<?php
class Conectar {
    protected $dbh;

    protected function conexion() {
        try {
            $serverName = "localhost\SQLEXPRESS"; 
            $connectionInfo = array(
                "Database" => "bdalumno",
                "UID" => "admin",
                "PWD" => "01020304", 
                "CharacterSet" => "UTF-8"
            );

            $this->dbh = sqlsrv_connect($serverName, $connectionInfo);

            if ($this->dbh === false) {
                die(print_r(sqlsrv_errors(), true));
            }

            return $this->dbh;

        } catch (Exception $e) {
            print "¡Error BD!: " . $e->getMessage() . "<br/>";
            die();
        }
    }
}
?>
