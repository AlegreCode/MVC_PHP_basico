<?php

namespace controllers;

use config\Render;

class UserController
{
    public function actionIndex()
    {
        $datos = [
            'title'         => 'Users',
            'header'        => 'List of users'
        ];
        Render::render('users', $datos);
    }
}
