<?php

require_once "../controllers/AppController.php";
require_once "../models/User.php";
require_once "../db/Conexion.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (
        isset($_POST['id'])             &&
        isset($_POST['direccion_id'])   &&
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
            'id'                => intval($_POST['id']),
            'direccion_id'      => intval($_POST['direccion_id']),
            'nombre'            => $_POST['nombre'],
            'apellido'          => $_POST['apellido'],
            'email'             => $_POST['email'],
            'edad'              => intval($_POST['edad']),
            'calle'             => $_POST['calle'],
            'ciudad'            => $_POST['ciudad'],
            'provincia'         => $_POST['provincia'],
            'pais'              => $_POST['pais']
        ];
        $appController = new controllers\AppController();
        $resultado = $appController->actionUpdate($datos);
        echo json_encode($resultado);
    }
}