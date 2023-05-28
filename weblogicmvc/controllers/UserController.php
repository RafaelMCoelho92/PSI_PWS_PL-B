<?php
require_once 'models/User.php';
require_once 'Controller.php';

class UserController extends Controller
{
    public function index()
    {
        $users = User::all(); // devolve sempre um array mesmo q seja só um 
        //$books = Book::find('all');  VERSAO 8.2
        //mostrar a vista index passando os dados por parâmetro
        $this->renderView('user', 'index', ['users' => $users]);

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
        $this->renderView('user', 'create');

    }
    public function store()
    {
        //recebe os dados do form de criacao valida e persiste na BD
        $user = new User($this->getHTTPPost());
        if ($user->is_valid()) {
            $user->save();

            $this->redirectToRoute('home', 'index');
            //redirecionar para o index
        } else {
            //mostrar vista create passando o modelo como parâmetro
            $this->renderView('user', 'create',['user'=> $user]);
        }
    }
    public function edit($id)
    {
        //mostra a vista com form de edicao de um registo identificado pelo seu ID
        $user = User::find($id);
        if (is_null($user)) {
            //TODO redirect to standard error page
        } else {
            $this->renderView('user','edit',['user'=>$user]);
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
            $this->renderView('user','edit',['user'=>$user]);
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
}