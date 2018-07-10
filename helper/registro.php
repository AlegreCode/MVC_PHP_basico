<?php

require_once "../controllers/AppController.php";
require_once "../models/User.php";
require_once "../db/Conexion.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (
        isset($_POST['nombre'])         &&
        isset($_POST['apellido'])       &&
        isset($_POST['email'])          &&
        isset($_POST['edad'])           &&
        isset($_POST['calle'])          &&
        isset($_POST['ciudad'])         &&
        isset($_POST['provincia'])      &&
        isset($_POST['pais'])
        ) {
        $datos = [
            'nombre'        => $_POST['nombre'],
            'apellido'      => $_POST['apellido'],
            'email'         => $_POST['email'],
            'edad'          => intval($_POST['edad']),
            'calle'         => $_POST['calle'],
            'ciudad'        => $_POST['ciudad'],
            'provincia'     => $_POST['provincia'],
            'pais'          => $_POST['pais'],
        ];

        $appController = new controllers\AppController();
        $resultado = $appController->actionAdd($datos);
        echo \json_encode($resultado);

    }
}