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
        $role = $_SESSION['role'];                         
            if ($role == "Admin" || $role == "Funcionario"){
            $this->renderView('layout', 'backoffice');
            }
    }
    public function frontoffice()
    {   
        $role = $_SESSION['role'];                          
        if ($role == "Cliente"){
            $this->renderView('layout', 'frontoffice');
        }
    }
}