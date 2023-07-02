<?php
require_once 'models/Folhaobra.php';
require_once 'models/Service.php';
require_once 'models/Iva.php';
require_once 'models/Empresa.php';
require_once 'Controller.php';
require_once 'models/User.php';
require_once 'models/Linhaobra.php';

class FolhaobraController extends Controller
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
            $folhasObra = Folhaobra::find('all', ['conditions' => ['estado IN (?)', ['Emitida', 'Em Lançamento', 'Paga']]]);
            $this->renderView('folhaobra', 'index', ['folhasObra' => $folhasObra]);
        } elseif ($role == "Funcionario") {
            $id = $auth->getId();
            $folhasObra = Folhaobra::find('all', ['conditions' => ['estado != ? and idfuncionario = ?', 'Anulada', $id]]);
            $this->renderView('folhaobra', 'index', ['folhasObra' => $folhasObra]);
        } elseif ($role == "Cliente") {
            $id = $auth->getId();
            $folhasObra = Folhaobra::find('all', ['conditions' => ['estado != ? and idcliente = ?', 'Anulada', $id]]);
            $this->renderView('folhaobra', 'index', ['folhasObra' => $folhasObra], 'frontoffice');
        } else {
            header('Location: index.php?' . INVALID_ACCESS_ROUTE);
        }
    }




    public function show($id)
    {
        $auth = new Auth();
        $role = $auth->getRole();
        $empresa = Empresa::first();
        $folhaObra = Folhaobra::find($id);
        $linhaObras = Linhaobra::find_all_by_idfolhaObra($folhaObra->id);
        if (is_null($folhaObra)) {
            //TODO redirect to standard error page
        } else {
            if ($role == 'Cliente') {
                $this->renderView('folhaObra', 'show', ['folhaObra' => $folhaObra, 'empresa' => $empresa, 'linhaObras' => $linhaObras], 'frontoffice');
                //mostrar a vista show passando os dados por parâmetro
            } else {
                $this->renderView('folhaObra', 'show', ['folhaObra' => $folhaObra, 'empresa' => $empresa, 'linhaObras' => $linhaObras]);
            }
        }
    }

    public function store($id)
    {

        //mostra vista com form de criacao de registo
        $folha = new Folhaobra();
        $folhaobra = $folha->storeFolha($id);
        if ($folhaobra->is_valid()) {
            $folhaobra->save(); // redirect se n for tem q se fazer renderview
            $this->redirectToRoute('linhaobra', 'index', ['idfolhaobra' => $folhaobra->id]);
        } else {
            $users = User::all();
            $this->renderView('user', 'select', ['users' => $users]);
        }
    }
    public function edit($id)
    {
        $services = Service::all();
        $empresa = Empresa::first();
        $folhaobra = Folhaobra::find($id);
        if ($folhaobra->estado  == "Emitida" || $folhaobra->estado  == "Paga") {
            $this->redirectToRoute('folhaobra', 'index');
        } else {
            $linhaobras = Linhaobra::find_all_by_idfolhaobra($folhaobra->id);
            if (is_null($folhaobra)) {
                //TODO redirect to standard error page
            } else {
                //mostrar a vista edit passando os dados por parâmetro
                $this->renderView('folhaobra', 'edit', ['folhaobra' => $folhaobra, 'empresa' => $empresa, 'linhaobras' => $linhaobras, 'services' => $services]);
            }
        }
    }

    public function update($id)
    {
        $folha = new Folhaobra();
        $folhaobra = $folha->updateFolha($id);
        if ($folhaobra->is_valid()) {
            $folhaobra->save();
            //redirecionar para o index
            $this->redirectToRoute('folhaobra', 'edit', ['id' => $id]);
        } else {
            //mostrar vista edit passando o modelo como parâmetro
            $this->renderView('folhaobra', 'edit', ['folhaobra' => $folhaobra]);
        }
    }

    public function delete($id)
    {
        //apaga um registo da BD identificado pelo ID
        $folhaObra = Folhaobra::find($id);
        if ($folhaObra->is_valid()) {
            $folhaObra->delete();
        }
        //redirecionar para o index
        $this->redirectToRoute('folhaobra', 'index');
    }

    public function anular($id)
    {
        $folhaobra = Folhaobra::find($id);
        $folhaobra->estado = "Anulada";
        if ($folhaobra->is_valid()) {
            $folhaobra->save();
        }
        $this->redirectToRoute('folhaobra', 'index');
    }
    public function paga($id)
    {
        $folhaobra = Folhaobra::find($id);
        $folhaobra->estado = "Paga";
        if ($folhaobra->is_valid()) {
            $folhaobra->save();
        }
        $this->redirectToRoute('folhaobra', 'index');
    }
    public function emitir($id)
    {
        $folhaobra = Folhaobra::find($id);
        if ($folhaobra->estado == "Paga") {
            $this->redirectToRoute('folhaobra', 'index');
        } else {
            $folhaobra->estado = "Emitida";
            $folhaobra->data = date('d-m-Y H:i:s'); // atualiza as horas quando é emitida
            if ($folhaobra->is_valid()) {
                $folhaobra->save();
            }
            $this->redirectToRoute('folhaobra', 'index');
        }
    }
}
