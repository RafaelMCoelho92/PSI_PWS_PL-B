<?php  //Controlador de Login
require_once 'models/Auth.php';
require_once 'Controller.php';
class AuthController extends Controller
{
    public function index()
    {
        $this->renderView('home', 'index');  
    }
    public function login()
    {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $auth = new Auth();
        if ($auth->checkAuth($username, $password) == true) {
            
            header('Location: index.php?c=reservado&a=admin'); //redirectroroute??
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
