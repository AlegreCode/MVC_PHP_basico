<?php

require_once "../controllers/AppController.php";
require_once "../models/User.php";
require_once "../db/Conexion.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['id'])) {
        $datos = [
            'id'            => intval($_POST['id']),
            'direccion_id'  => intval($_POST['direccion_id'])
        ];

        $appController = new controllers\appController();
        $resultado = $appController->actionDelete($datos);
        echo json_encode($resultado);
    }
}