<?php

namespace controllers;

use config\Render;
use models\User as User;

class AppController
{
    public $userModel;
    public function __construct() {
        $this->userModel = new User();
    }
    public function actionIndex()
    {
        $data = [
            'title'     => 'Home',
            'datos'     => $this->userModel->getUsers()
        ];
        Render::render('home', $data);
    }

    public function actionAdd($datos)
    {
        $resultado = $this->userModel->addUser($datos);
        return $resultado;
    }

    public function actionEdit($id)
    {
        $idUser = intval($id);
        $resultado = $this->userModel->getUser($idUser);
        $datos = [
            'title'     => 'Editar Usuario',
            'datos'     => $resultado
        ];
        Render::render('edit', $datos);
    }

    public function actionUpdate($datos)
    {
        $resultado = $this->userModel->updateUser($datos);
        return $resultado;
    }

    public function actionDelete($datos)
    {
        $resultado = $this->userModel->deleteUser($datos);
        return $resultado;
    }
}
