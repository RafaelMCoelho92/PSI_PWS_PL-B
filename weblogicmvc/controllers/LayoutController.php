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
        }
    }
    public function frontoffice()
    {
        $role = $_SESSION['role'];
        if ($role == "Cliente") {
            $auth = new Auth();
            $id = $auth->getId();

            $folhasobras = Folhaobra::find('all', ['conditions' => ['idcliente = ?', $id]]);
            $numfolhasobras = count($folhasobras);

            $folhasobraspagas = Folhaobra::find('all', ['conditions' => ['idcliente = ? AND estado = ?', $id, 'Paga']]);
            $numfolhasobraspagas = count($folhasobraspagas);

            $folhasobrasemitidas = Folhaobra::find('all', ['conditions' => ['idcliente = ? AND estado = ?', $id, 'Emitida']]);
            $numfolhasobrasemitidas = count($folhasobrasemitidas);

            $this->renderView('layout', 'frontoffice', ['numfolhasobras' => $numfolhasobras, 'numfolhasobraspagas' => $numfolhasobraspagas, 'numfolhasobrasemitidas' => $numfolhasobrasemitidas], 'default');
        }
    }
}
