<?php
require_once 'models/Auth.php';
require_once 'Controller.php';

class LayoutController extends Controller
{
    public function __construct()
    {
        $this->authenticationFilter(); // chamando a função de verificação de autenticação
    }
    public function backoffice()
    {   
            // fazer um switch pro role q devolver
            $this->renderView('layout', 'backoffice');
    }
}