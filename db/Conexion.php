<?php

namespace db;

class Conexion
{
    public $cxn;
    public $host;
    public $user;
    public $database;
    public $password;

    public function __construct($host, $user, $password, $database) {
        $this->host = $host;
        $this->user = $user;
        $this->password = $password;
        $this->database = $database;
    }

    public function conectar()
    {
        $this->cxn = new \mysqli($this->host, $this->user, $this->password, $this->database);
        if ($this->cxn->connect_errno) {
            $conexion = [
                'status'        => false,
                'msg'           => 'Fallo al conectar a MySQL: ' . $this->cxn->connect_error
            ];
            echo json_encode($conexion);
        }
        $this->cxn->set_charset("utf8");
        return $this->cxn;
    }


}
