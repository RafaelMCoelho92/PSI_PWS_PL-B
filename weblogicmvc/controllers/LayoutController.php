<?php
require_once 'models/Auth.php';
require_once 'Controller.php';

class LayoutController extends Controller
{
    public function __construct()
    {
        $this->authenticationFilter(); // chamando a função de verificação de autenticação
    }
    public function default()
    {
        $role = $_SESSION['role'];
        if ($role == "Admin" || $role == "Funcionario") {
            $folhasobras = Folhaobra::all();
            $numfolhasobras = count($folhasobras);
            $this->renderView('home', 'dashboardbo', ['numfolhasobras' => $numfolhasobras], 'default');
        }else {
            header('Location: index.php?' . INVALID_ACCESS_ROUTE);
        }
    }
    public function frontoffice()
    {
        $role = $_SESSION['role'];
        if ($role == "Cliente") {
            $this->renderView('layout', 'frontoffice');
        }
        else {
            header('Location: index.php?' . INVALID_ACCESS_ROUTE);
        }
    }
}
