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
        $username = $this->getHTTPPostParam('username');
        $password = $this->getHTTPPostParam('password');
        $auth = new Auth();
        //
        if ($user = User::find_by_username($username)) {
            $passHash = $user->password;
            if (password_verify($password, $passHash)) {

                if ($auth->checkAuth($username, $passHash) == true) { //e seja cliente ,func, admin manda pra sitios diferentes
                    $role = $auth->getRole();                           // obter o role do user
                    if ($role == 'Admin' || $role == 'Funcionario') { // se for admin ou funcionario vai para o BACKoffice
                        $this->redirectToRoute("home", "dashboardbo");
                    } elseif ($role == 'Cliente') {                     // se for funcionario vai para o FRONToffice
                        $this->redirectToRoute("home", "dashboardfo");
                    }
                    //header('Location: index.php?c=layout&a=backoffice'); //redirectroroute??
                }
            }
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
