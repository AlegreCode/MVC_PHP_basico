<?php

define('APP_PATH', [
    'controllers'       => 'controllers/',
    'views'             => 'views/',
    'models'            => 'models/',
    'config'            => 'config/'
]);

require_once('./config/autoload.php');

$router = new \config\Router();