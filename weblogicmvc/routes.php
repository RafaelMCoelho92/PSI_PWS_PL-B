<?php
require_once 'controllers/AuthController.php';
require_once 'controllers/HomeController.php';
require_once 'controllers/EmpresaController.php';
require_once 'controllers/UserController.php';
require_once 'controllers/ServiceController.php';
require_once 'controllers/IvaController.php';
require_once 'controllers/FolhaobraController.php';
require_once 'controllers/ClienteController.php';
require_once 'controllers/LinhaobraController.php';



return [
    'defaultRoute' => ['GET', 'HomeController', 'index'],

    'home' => [
        'index' => ['GET', 'HomeController', 'index'],
        'dashboardbo' => ['GET', 'HomeController', 'dashboardbo'],
        'dashboardfo' => ['GET', 'HomeController', 'dashboardfo'],
    ],

    'auth' => [
        'index' => ['GET', 'AuthController', 'index'],
        'login' => ['POST', 'AuthController', 'login'],
        'logout' => ['GET', 'AuthController', 'logout']
    ],

    'empresa' => [
        'index' => ['GET', 'EmpresaController', 'index'],
        'create' => ['GET', 'EmpresaController', 'create'],
        'edit' => ['GET', 'EmpresaController', 'edit'],
        'show' => ['GET', 'EmpresaController', 'show'],
        'store' => ['POST', 'EmpresaController', 'store'],
        'delete' => ['GET', 'EmpresaController', 'delete'],
        'update' => ['POST', 'EmpresaController', 'update'],
    ],
    'cliente' => [
        'empresa' => ['GET', 'ClienteController', 'empresa'],
        'folhaobraindex' => ['GET', 'ClienteController', 'folhaobraindex'],
        'folhaobrashow' => ['GET', 'ClienteController', 'folhaobrashow'],
        'pagar' => ['GET', 'ClienteController', 'pagar'],
        'folhaobrapaga' => ['GET', 'ClienteController', 'folhaobrapaga'],
        'folhaobraemitida' => ['GET', 'ClienteController', 'folhaobraemitida'],
        'edit' => ['GET', 'ClienteController', 'edit'],
    ],

    'folhaobra' => [
        'index' => ['GET', 'FolhaobraController', 'index'],
        'create' => ['GET', 'FolhaobraController', 'create'],
        'show' => ['GET', 'FolhaobraController', 'show'],
        'edit' => ['GET', 'FolhaobraController', 'edit'],
        'update' => ['GET', 'FolhaobraController', 'update'],
        'anular' => ['GET', 'FolhaobraController', 'anular'],
        'paga' => ['GET', 'FolhaobraController', 'paga'],
        'emitir' => ['GET', 'FolhaobraController', 'emitir'],
        'store' => ['GET', 'FolhaobraController', 'store'],


    ],
    'linhaobra' => [
        'store' => ['POST|GET', 'LinhaobraController', 'store'],
        'delete' => ['GET', 'LinhaobraController', 'delete'],
        'index' => ['GET', 'LinhaobraController', 'index'],
        'create' => ['GET', 'LinhaobraController', 'create'],
        'edit' => ['GET', 'LinhaobraController', 'edit'],
        'update' => ['POST', 'LinhaobraController', 'update'],


    ],

    'user' => [
        'create' => ['GET', 'UserController', 'create'],
        'store' => ['POST', 'UserController', 'store'],
        'index' => ['GET', 'UserController', 'index'],
        'delete' => ['GET', 'UserController', 'delete'],
        'show' => ['GET', 'UserController', 'show'],
        'edit' => ['GET', 'UserController', 'edit'],
        'update' => ['POST', 'UserController', 'update'],
        'reservado' => ['GET', 'UserController', 'reservado'],
        'select' => ['GET', 'UserController', 'select'],
        'search' => ['POST', 'UserController', 'search'],
        'search_user' => ['POST', 'UserController', 'search_user'],

    ],

    'service' => [
        'index' => ['GET', 'ServiceController', 'index'],
        'create' => ['GET', 'ServiceController', 'create'],
        'store' => ['POST', 'ServiceController', 'store'],
        'show' => ['GET', 'ServiceController', 'show'],
        'edit' => ['GET', 'ServiceController', 'edit'],
        'update' => ['POST', 'ServiceController', 'update'],
        'delete' => ['GET', 'ServiceController', 'delete'],
        'select' => ['POST', 'ServiceController', 'select'],
        'search_service' => ['POST', 'ServiceController', 'search_service'],
    ],

    'iva' => [
        'index' => ['GET', 'IvaController', 'index'],
        'create' => ['GET', 'IvaController', 'create'],
        'store' => ['POST', 'IvaController', 'store'],
        'show' => ['GET', 'IvaController', 'show'],
        'edit' => ['GET', 'IvaController', 'edit'],
        'update' => ['POST', 'IvaController', 'update'],
        'delete' => ['GET', 'IvaController', 'delete'],
    ],
];
