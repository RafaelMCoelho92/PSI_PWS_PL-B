<?php  //Controlador de Login
require_once 'models/Auth.php';
require_once 'Controller.php';

// AuthController herda todas as propriedades e métodos da classe Controller
class AuthController extends Controller
{
    public function index()
    {
        $this->renderView('home', 'index', [], 'login');
    }
    public function login()
    {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $auth = new Auth();
        if ($auth->checkAuth($username, $password) == true) { //e seja cliente ,func, admin manda pra sitios diferentes
            $role = $_SESSION['role'];                           // obter o role do user
            if ($role == 'Admin' || $role == 'Funcionario') { // se for admin ou funcionario vai para o BACKoffice
                $this->redirectToRoute("home", "dashboardbo");
            } elseif ($role == 'Cliente') {                     // se for funcionario vai para o FRONToffice
                $this->redirectToRoute("home", "dashboardfo");
            }
            //header('Location: index.php?c=layout&a=backoffice'); //redirectroroute??
        } else {
            $this->renderView('home', 'index', [], 'login');
        }
    }
    public function logout()
    {
        $sair = new Auth();
        $sair->logout();
        header('Location: index.php?c=defaultRoute');
    }
}
