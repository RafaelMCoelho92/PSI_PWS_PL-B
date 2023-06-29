<?php
require_once 'models/Iva.php';
require_once 'Controller.php';

class IvaController extends Controller
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
        $ivas = Iva::all();
        // Mostrar a vista index passando os dados por parâmetro
        $this->renderView('iva', 'index', ['ivas' => $ivas], 'default');
    }

    public function show($id)
    {
        // Mostrar vista com detalhes
        $iva = Iva::find($id);
        if (is_null($iva)) {
            // Redirecionar ou exibir mensagem de erro
        } else {
            $this->renderView('iva', 'show', ['iva' => $iva]);
        }
    }

    public function create()
    {
        $this->renderView('iva', 'create');
    }

    public function store()
    {
        // Receber os dados do formulário de criação, validar e persistir no BD
        $iva = new Iva($this->getHTTPPost());
        if ($iva->is_valid()) {
            $iva->save();
            $this->redirectToRoute('iva', 'index');
        } else {
            $this->renderView('iva', 'create', ['iva' => $iva]);
        }
    }

    public function edit($id)
    {
        // Mostrar a vista com formulário de edição de um registo identificado pelo seu ID
        $iva = Iva::find($id);
        if (is_null($iva)) {
            // Redirecionar ou exibir mensagem de erro
        } else {
            $this->renderView('iva', 'edit', ['iva' => $iva]);
        }
    }

    public function update($id)
    {
        // Receber os dados do formulário de edição de um registo identificado pelo seu ID, validar e persistir no BD
        $iva = Iva::find($id);
        $iva->update_attributes($this->getHTTPPost());
        if ($iva->is_valid()) {
            $iva->save();
            $this->redirectToRoute('iva', 'index');
        } else {
            $this->renderView('iva', 'edit', ['iva' => $iva]);
        }
    }

    public function delete($id)
    {
        $iva = Iva::find($id);
        if ($iva) {
            $services = Service::find_all_by_iva_id($iva->id); 
            if (!empty($services)) {
                $this->redirectToRoute('iva', 'index');
            } else {
                $iva->delete();
                $this->redirectToRoute('iva', 'index');
            }
        } else {
            $this->redirectToRoute('iva', 'index');
        }
    }
    
    
}
