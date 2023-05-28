<?php
require_once 'models/Auth.php';
require_once 'Controller.php';

class ReservadoController extends Controller
{
    public function __construct()
    {
        $this->authenticationFilter(); // chamando a função de verificação de autenticação
    }
    public function admin()
    {   
            // fazer um switch pro role q devolver
            $this->renderView('reservado', 'admin');
    }
}