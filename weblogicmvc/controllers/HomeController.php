<?php

require_once 'Controller.php';
class HomeController extends Controller
{
    public function __construct()
    {
        $this->authenticationFilter(['Funcionario', 'Admin', 'Cliente']); // chamando a função de verificação de autenticação
    }
    public function index()
    {

        $this->renderView('home', 'index', [], 'login');
    }

    public function dashboardbo()
    {
        $role = $_SESSION['role'];
        if ($role == "Admin" || $role == "Funcionario") {
            $folhasobras = Folhaobra::all();
            $numfolhasobras = count($folhasobras);
            $users = User::all();
            $numusers = count($users);
            $servicos = Service::all();
            $numservicos = count($servicos);
            $this->renderView('home', 'dashboardbo', ['numfolhasobras' => $numfolhasobras, 'numusers' => $numusers, 'numservicos' => $numservicos], 'default');           
        }else {
            header('Location: index.php?' . INVALID_ACCESS_ROUTE);
        }
    }

    public function dashboardfo()
    {
        $role = $_SESSION['role'];
        if ($role == "Cliente") {
            $folhasobras = Folhaobra::all();
            $numfolhasobras = count($folhasobras);
            $users = User::all();
            $numusers = count($users);
            $this->renderView('home', 'dashboardfo', ['numfolhasobras' => $numfolhasobras, 'numusers' => $numusers], 'frontoffice');
        }else {
            header('Location: index.php?' . INVALID_ACCESS_ROUTE);
        }
    }
}
