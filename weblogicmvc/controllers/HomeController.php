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
        $auth = new Auth();
        $role = $auth->getRole();
        if ($role == "Admin") {
            $folhasobras = Folhaobra::all();
            $numfolhasobras = count($folhasobras);
            $users = User::all();
            $numusers = count($users);
            $servicos = Service::all();
            $numservicos = count($servicos);
            $this->renderView('home', 'dashboardbo', ['numfolhasobras' => $numfolhasobras, 'numusers' => $numusers, 'numservicos' => $numservicos], 'default');
        } elseif ($role == "Funcionario") {
            $id = $auth->getId();
            $users = User::find_all_by_role('Cliente');
            $numusers = count($users);
            $servicos = Service::all();
            $numservicos = count($servicos);
            $folhasobras = Folhaobra::find_all_by_idfuncionario($id);
            $numfolhasobras = count($folhasobras);
            $this->renderView('home', 'dashboardbo', ['numfolhasobras' => $numfolhasobras, 'numusers' => $numusers, 'numservicos' => $numservicos], 'default');
        } else {
            header('Location: index.php?' . INVALID_ACCESS_ROUTE);
        }
    }

    public function dashboardfo()
    {
        $auth = new Auth();

        $role = $auth->getRole();
        if ($role == "Cliente") {
            $id = $auth->getId();

            $folhasobras = Folhaobra::find_all_by_idcliente($id);
            $numfolhasobras = count($folhasobras);

            $folhasobraspagas = Folhaobra::find('all', ['conditions' => ['idcliente = ? AND estado = ?', $id, 'Paga']]);
            $numfolhasobraspagas = count($folhasobraspagas);

            $folhasobrasemitidas = Folhaobra::find('all', ['conditions' => ['idcliente = ? AND estado = ?', $id, 'Emitida']]);
            $numfolhasobrasemitidas = count($folhasobrasemitidas);

            $this->renderView('home', 'dashboardfo', ['numfolhasobras' => $numfolhasobras, 'numfolhasobraspagas' => $numfolhasobraspagas, 'numfolhasobrasemitidas' => $numfolhasobrasemitidas], 'frontoffice');
        } else {
            header('Location: index.php?' . INVALID_ACCESS_ROUTE);
        }
    }
}
