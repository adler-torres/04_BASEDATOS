<?php

class conexion {
    private $servername = "localhost";
    private $username = "root";
    private $password = "";
    private $dbname = "ejemplo_wep2";

    private $conexion;
    public function __construct() {
        $this->conexion = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
        if ($this->conexion->connect_error) {
            die("Connection fallida: " . $this->conexion->connect_error);

        }
    }

    public function getConexion() {
        return $this->conexion;
    }

    public function __destruct() {
        $this->conexion->close();
    }

    

  
}
