<?php  //Controlador de Login
require_once 'models/Auth.php';
require_once 'Controller.php';

// AuthController herda todas as propriedades e métodos da classe Controller
class AuthController extends Controller
{
    public function index()
    {
        // vai mostrar a view sempre que for chamada
        $this->renderView('home', 'index');
    }
    public function login()
    {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $auth = new Auth();
        if ($auth->checkAuth($username, $password) == true) { //e seja cliente ,func, admin manda pra sitios diferentes

            header('Location: index.php?c=layout&a=backoffice'); //redirectroroute??
        } else {
            $this->renderView('home', 'index');
        }
    }
    public function logout()
    {
        $sair = new Auth();
        $sair->logout();
        header('Location: index.php?c=defaultRoute');
    }
}
