<?php
require_once 'models/Empresa.php';
require_once 'Controller.php';

class EmpresaController extends Controller // acesso aos métodos e propriedades definidos na classe Controller
{
    public function __construct()
    {
        $this->authorizationFilter(['Funcionario', 'Admin', 'Cliente']);
        //Ele chama o método authorizationFilter(['Funcionario','Admin']) definido na classe Controller. 
        //Esse método verifica se o usuário está autenticado como "Funcionario" ou "Admin". 
        //Caso contrário, o usuário é redirecionado para uma rota de acesso inválido.
    }
    public function index()
    {
        $empresas = Empresa::all(); // devolve sempre um array mesmo q seja só um 
        //$books = Book::find('all');  VERSAO 8.2
        //mostrar a vista index passando os dados por parâmetro
        $this->renderView('empresa', 'index', ['empresas' => $empresas]);
    }
    public function show($id)
    {
        $auth = new Auth();
        $role = $auth->getRole();
        $empresa = Empresa::find($id);
        if ($role != 'Cliente') {
            //mostra vista com detalhes
            if (is_null($empresa)) {
                //TODO redirect to standard error page
            } else {
                //mostrar a vista show passando os dados por parâmetro
                $this->renderView('empresa', 'show', ['empresa' => $empresa]);
            }
        } else {
            $this->renderView('cliente', 'empresa', ['empresa' => $empresa], 'frontoffice');
        }
    }
    public function create()
    {
        $this->authorizationFilter(['Admin']);
        //mostra vista com form de criacao de registo
        $this->renderView('empresa', 'create');
    }
    public function store()
    {
        $this->authorizationFilter(['Admin']);
        //recebe os dados do form de criacao valida e persiste na BD
        $empresa = new Empresa($this->getHTTPPost());
        if ($empresa->is_valid()) {
            $empresa->save();

            $this->redirectToRoute('empresa', 'index');
            //redirecionar para o index
        } else {
            //mostrar vista create passando o modelo como parâmetro
            $this->renderView('empresa', 'create', ['empresa' => $empresa]);
        }
    }
    public function edit($id)
    {
        $this->authorizationFilter(['Admin']);
        //mostra a vista com form de edicao de um registo identificado pelo seu ID
        $empresa = Empresa::find($id);
        if (is_null($empresa)) {
            //TODO redirect to standard error page
        } else {
            $this->renderView('empresa', 'edit', ['empresa' => $empresa]);
            //mostrar a vista edit passando os dados por parâmetro
        }
    }
    public function update($id)
    {
        $this->authorizationFilter(['Admin']);
        // recebe os dados do form de edicao de um registo identificado pelo seu id valida e persiste na BD
        $empresa = Empresa::find($id);
        $empresa->update_attributes($this->getHTTPPost());
        if ($empresa->is_valid()) {
            $empresa->save();
            //redirecionar para o index
            $this->redirectToRoute('empresa', 'index');
        } else {
            //mostrar vista edit passando o modelo como parâmetro
            $this->renderView('empresa', 'edit', ['empresa' => $empresa]);
        }
    }
    public function delete($id)
    {
        $this->authorizationFilter(['Admin']);
        //apaga um registo da BD identificado pelo ID
        $empresa = Empresa::find($id);
        $empresa->delete();
        //redirecionar para o index
        $this->redirectToRoute('empresa', 'index');
    }
}
