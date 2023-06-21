<?php  

require_once 'Controller.php';
class HomeController extends Controller
{
    public function __construct()
    {
        $this->authenticationFilter(); // chamando a função de verificação de autenticação
    }
    public function index()
    {
        
        $this->renderView('home', 'index', [], 'login');  
    }

    public function dashboardbo()
    {     
        $role = $_SESSION['role'];                         
            if ($role == "Admin" || $role == "Funcionario"){
                $folhasobras = Folhaobra::all();
                $numfolhasobras = count($folhasobras);
            $this->renderView('home', 'dashboardbo', ['numfolhasobras'=> $numfolhasobras],'default');
            }
    }
}