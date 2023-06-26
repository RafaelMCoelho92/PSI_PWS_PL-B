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
    {   // vai buscar todas as folhas de obras que nao tem no estado anulada
        // ver o role  getRole()
        //se for admin mostra todas menos as anulas (é o que ja esta embaixo)
        // se for funcionario mostra apenas as emitidas por ele idfuncionario == getid(tem q se trocar a condicao)
        $folhasObra = Folhaobra::find('all', ['conditions' => ['estado != ?', 'Anulada']]);
        $this->renderView('folhaobra', 'index', ['folhasObra' => $folhasObra]);
    }


    public function show($id)
    {
        $empresa = Empresa::first();
        $folhaObra = Folhaobra::find($id);
        $linhaObras = Linhaobra::find('all', array('conditions' => array('idfolhaObra = ?', $folhaObra->id)));
        if (is_null($folhaObra)) {
            //TODO redirect to standard error page
        } else {
            //mostrar a vista show passando os dados por parâmetro
            $this->renderView('folhaObra', 'show', ['folhaObra' => $folhaObra, 'empresa' => $empresa, 'linhaObras' => $linhaObras]);
        }
    }

    public function create($id)
    {
        //mostra vista com form de criacao de registo
        $empresas = Empresa::first();
        $services = Service::all();
        $user = User::find($id);
        $folhaobra = new Folhaobra();
        $folhaobra->idcliente = $user->id;
        $funcionario = new Auth();
        $idfuncionario = $funcionario->getId();
        $folhaobra->idfuncionario = $idfuncionario;
        $folhaobra->data = date('d-m-Y H:i:s');
        $folhaobra->valortotal = 0;
        $folhaobra->ivatotal = 0;
        $folhaobra->subtotal = 0;
        $folhaobra->save();
        $this->renderView('folhaObra', 'create', ['folhaobra' => $folhaobra, 'empresas' => $empresas, 'services' => $services]);
    }
    public function edit($id)
    {
        $services = Service::all();
        $empresa = Empresa::first();
        $folhaobra = Folhaobra::find($id);
        if ($folhaobra->estado  == "Emitida" || $folhaobra->estado  == "Paga") {
            $this->redirectToRoute('folhaobra', 'index');
        } else {
            $linhaobras = Linhaobra::find('all', array('conditions' => array('idfolhaobra = ?', $folhaobra->id)));
            if (is_null($folhaobra)) {
                //TODO redirect to standard error page
            } else {
                //mostrar a vista edit passando os dados por parâmetro
                $this->renderView('folhaobra', 'edit', ['folhaobra' => $folhaobra, 'empresa' => $empresa, 'linhaobras' => $linhaobras, 'services' => $services]);
            }
        }
    }


    public function store()
    {
        //recebe os dados do form de criacao valida e persiste na BD
        $empresas = Empresa::all();
        $ivas = Iva::all();
        $services = Service::all();
        $users = User::all();
        $folhaobra = new Folhaobra($this->getHTTPPost());
        if ($folhaobra->is_valid()) {
            $folhaobra->save();
            //redirecionar para o index das folhas de obra
            $this->redirectToRoute('folhaobra', 'index');
        } else {
            //mostrar vista create passando o modelo como parâmetro
            $this->renderView('folhaobra', 'create', ['folhaobra' => $folhaobra, 'empresas' => $empresas, 'ivas' => $ivas, 'services' => $services, 'users' => $users]);
        }
    }

    public function update($id)
    {
        // recebe os dados do form de edicao de um registo identificado pelo seu id valida e persiste na BD
        $folhaobra = Folhaobra::find($id);
        $valortotal = 0;
        $ivatotal = 0;
        $subtotal = 0;
        $linhaobras = Linhaobra::find('all', array('conditions' => array('idfolhaobra = ?', $folhaobra->id)));

        foreach ($linhaobras as $linhaobra) {
            $subtotal += $linhaobra->quantidade * $linhaobra->servico->precohora;
            $linhaobra->valoriva = ($linhaobra->servico->precohora * $linhaobra->servico->iva->percentagem) / 100;
            $ivatotal += $linhaobra->valoriva * $linhaobra->quantidade;
        }
        $folhaobra->subtotal = $subtotal;
        $folhaobra->ivatotal = $ivatotal;
        $folhaobra->valortotal = $subtotal + $ivatotal;


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
        $folhaObra->delete();
        //redirecionar para o index
        $this->redirectToRoute('folhaobra', 'index');
    }

    public function anular($id)
    {
        $folhaobra = Folhaobra::find($id);
        $folhaobra->estado = "Anulada";
        $folhaobra->save();
        $this->redirectToRoute('folhaobra', 'index');
    }
    public function paga($id)
    {
        $folhaobra = Folhaobra::find($id);
        $folhaobra->estado = "Paga";
        $folhaobra->save();
        $this->redirectToRoute('folhaobra', 'index');
    }
    public function emitir($id)
    {
        $folhaobra = Folhaobra::find($id);
        if($folhaobra->estado == "Paga"){
            $this->redirectToRoute('folhaobra', 'index');
        }else{
        $folhaobra->estado = "Emitida";
        $folhaobra->save();
        $this->redirectToRoute('folhaobra', 'index');
        }
    }
}
