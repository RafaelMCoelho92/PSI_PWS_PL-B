<?php
require_once 'models/User.php';
require_once 'models/Auth.php';
require_once 'Controller.php';

class UserController extends Controller
{
    public function __construct()
    {
        $this->authorizationFilter(['Funcionario', 'Admin']);
        //Ele chama o método authorizationFilter(['Funcionario','Admin']) definido na classe Controller. 
        //Esse método verifica se o usuário está autenticado como "Funcionario" ou "Admin". 
        //Caso contrário, o usuário é redirecionado para uma rota de acesso inválido.
    }
    public function index()
    {
        $auth = new Auth();
        $role = $auth->getRole();

        if ($role == "Admin") {
            $users = User::all();
            $this->renderView('user', 'index', ['users' => $users]);
        } elseif ($role == "Funcionario") {
            $users = User::find('all', ['conditions' => ['role = ?', 'Cliente']]);
            $this->renderView('user', 'index', ['users' => $users]);
        } else {
            header('Location: index.php?' . INVALID_ACCESS_ROUTE);
        }
    }
    public function show($id)
    {
        //mostra vista com detalhes
        $user = User::find($id);
        if (is_null($user)) {
            //TODO redirect to standard error page
        } else {
            //mostrar a vista show passando os dados por parâmetro
            $this->renderView('user', 'show', ['user' => $user]);
        }
    }
    public function create()
    {
        //mostra vista com form de criacao de registo
        $this->renderView('user', 'create'); //['roles' => $roles]

    }
    public function store()
    {
        //recebe os dados do form de criacao valida e persiste na BD
        $user = new User($this->getHTTPPost());
        if ($user->is_valid()) {
            $user->save();

            $this->redirectToRoute('user', 'index');
            //redirecionar para o index
        } else {
            //mostrar vista create passando o modelo como parâmetro
            $this->renderView('user', 'create', ['user' => $user]);
        }
    }
    public function edit($id)
    {
        //mostra a vista com form de edicao de um registo identificado pelo seu ID
        $user = User::find($id);
        $auth = new Auth();
        $role = $auth->getRole();
        if ($role == 'Admin') {
            $opcoes = ['Cliente', 'Funcionario', 'Admin'];
        } else {
            $opcoes = ['Cliente'];
        }

        if (is_null($user)) {
            //TODO redirect to standard error page
        } else {
            $this->renderView('user', 'edit', ['user' => $user, 'opcoes' => $opcoes]);
            //mostrar a vista edit passando os dados por parâmetro
        }
    }

    public function update($id)
    {
        // recebe os dados do form de edicao de um registo identificado pelo seu id valida e persiste na BD
        $user = User::find($id);
        $user->update_attributes($this->getHTTPPost());
        if ($user->is_valid()) {
            $user->save();
            //redirecionar para o index
            $this->redirectToRoute('user', 'index');
        } else {
            //mostrar vista edit passando o modelo como parâmetro
            $this->renderView('user', 'edit', ['user' => $user]);
        }
    }
    public function delete($id)
    {
        //apaga um registo da BD identificado pelo ID
        $user = User::find($id);
        $user->delete();
        //redirecionar para o index
        $this->redirectToRoute('user', 'index');
    }
    public function reservado()
    {
        $auth = new Auth();
        $id = $auth->getId();
        $user = User::find($id);
        //redirecionar para o index
        $this->renderView('user', 'reservado', ['user' => $user]);
    }
    public function select()
    {
        $auth = new Auth();
        $role = $auth->getRole();

        if ($role != "Cliente") {
            $users = User::find_all_by_role('Cliente');
            $this->renderView('user', 'select', ['users' => $users]);
        } else {
            header('Location: index.php?' . INVALID_ACCESS_ROUTE);
        }
    }
    public function search() // https://www.phpactiverecord.org/projects/main/wiki/Finders
    {
        $pesquisa = $this->getHTTPPostParam('pesquisa');
    
        if (!empty($pesquisa)) {
            $conditions = array(
                'conditions' => array(
                    'username LIKE ? OR telefone LIKE ? OR nif LIKE ? OR email LIKE ?',
                    "%$pesquisa%",
                    "%$pesquisa%",
                    "%$pesquisa%",
                    "%$pesquisa%"
                )
            );
    
            $users = User::all($conditions);
    
            if (!empty($users)) {
                $this->renderView('user', 'select', ['users' => $users]);
            } else {
                $users = User::find_all_by_role('Cliente');
                $this->renderView('user', 'select', ['users' => $users]);
            }
        } else {
            $this->redirectToRoute('user', 'select');
        }
    }
    

    public function search_user()
    {
        $pesquisa = $this->getHTTPPostParam('pesquisa');
        if (!empty($pesquisa)) {
            if ($users = User::find_all_by_username($pesquisa) != null) {
                $users = User::find_all_by_username($pesquisa);
                $this->renderView('user', 'index', ['users' => $users]);
            } elseif ($users = User::find_all_by_nif($pesquisa) != null) {
                $users  = User::find_all_by_nif($pesquisa);
                $this->renderView('user', 'index', ['users' => $users]);
            } elseif ($users = User::find_all_by_email($pesquisa) != null) {
                $users  = User::find_all_by_email($pesquisa);
                $this->renderView('user', 'index', ['users' => $users]);
            } elseif ($users = User::find_all_by_telefone($pesquisa) != null) {
                $users  = User::find_all_by_telefone($pesquisa);
                $this->renderView('user', 'index', ['users' => $users]);
            } else {
                $users = User::find_all_by_role('Cliente');
                $this->renderView('user', 'index', ['users' => $users]);
            }
        } else {
            $this->redirectToRoute('user', 'index');
        }
    }
}
