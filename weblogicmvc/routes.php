<?php
require_once 'controllers/AuthController.php';
require_once 'controllers/HomeController.php';
require_once 'controllers/EmpresaController.php';
require_once 'controllers/ReservadoController.php';
require_once 'controllers/UserController.php';
require_once 'controllers/ServiceController.php';


return [
    'defaultRoute' => ['GET', 'HomeController', 'index'],

    'home' => [
        'index' => ['GET', 'HomeController', 'index'],
    ],

    'auth' => [
        'index' => ['GET', 'AuthController', 'index'],
        'login' => ['POST', 'AuthController', 'login'],
        'logout' => ['GET', 'AuthController', 'logout']
    ],
    /*  
    'plano' => [
        'index' => ['GET', 'PlanoController', 'index'],
        'show' => ['POST', 'PlanoController', 'show'],
    ], */

    'empresa' => [
        'index' => ['GET', 'EmpresaController', 'index'],
        'create' => ['GET', 'EmpresaController', 'create'],
        'edit' => ['GET', 'EmpresaController', 'edit'],
        'show' => ['GET', 'EmpresaController', 'show'],
        'store' => ['POST', 'EmpresaController', 'store'],
        'delete' => ['GET', 'EmpresaController', 'delete'],
        'update' => ['POST', 'EmpresaController', 'update'],
    ],

    'reservado' => [
        'admin' => ['GET', 'ReservadoController', 'admin']
    ],

    'user' => [
        'create' => ['GET', 'UserController', 'create'],
        'store' => ['POST', 'UserController', 'store'],
        'index' => ['GET', 'UserController', 'index'],
        'delete' => ['GET', 'UserController', 'delete'],
        'show' => ['GET', 'UserController', 'show'],
        'edit' => ['GET', 'UserController', 'edit'],
        'update' => ['POST', 'UserController', 'update']
    ],

    'service' => [
        'index' => ['GET', 'ServiceController', 'index'],
        'create' => ['GET', 'ServiceController', 'create'],
        'store' => ['POST', 'ServiceController', 'store'],
        'show' => ['GET', 'ServiceController', 'show'],
        'edit' => ['GET', 'ServiceController', 'edit'],
        'update' => ['POST', 'ServiceController', 'update'],
        'delete' => ['GET', 'ServiceController', 'delete']
    ],
];
