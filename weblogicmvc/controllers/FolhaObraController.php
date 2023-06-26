<?php
require_once 'models/Folhaobra.php';
require_once 'models/Service.php';
require_once 'models/Iva.php';
require_once 'models/Empresa.php';
require_once 'Controller.php';

class FolhaObraController extends Controller
{
    public function index()
    {
        $folhasObra = Folhaobra::all();
        $this->renderView('folhaObra', 'index', ['folhasObra' => $folhasObra]);
    }

    public function show($id)
    {
        $folhaObra = Folhaobra::find($id);
        if (is_null($$folhaObra)) {
            //TODO redirect to standard error page
        } else {
            //mostrar a vista show passando os dados por parâmetro
            $this->renderView('folhaObra', 'show', ['folhaObra' => $folhaObra]);
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
        $folhaobra->save();
        $this->renderView('folhaObra', 'create', ['folhaobra' => $folhaobra, 'empresas' => $empresas, 'services'=>$services]);
    }
    public function edit($id)
    {
        $services = Service::all();
        $empresa = Empresa::first();
        $folhaobra = Folhaobra::find($id);
        $linhaobras = Linhaobra::find('all', array('conditions' => array('idfolhaobra = ?', $folhaobra->id)));
        if (is_null($folhaobra)) {
            //TODO redirect to standard error page
        } else {
            //mostrar a vista edit passando os dados por parâmetro
            $this->renderView('folhaobra', 'edit', ['folhaobra' => $folhaobra, 'empresa' => $empresa,'linhaobras' => $linhaobras,'services'=>$services]);
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
        $linhaobras = Linhaobra::find('all', array('conditions' => array('idfolhaobra = ?', $folhaobra->id)));

        foreach ($linhaobras as $linhaobra) {
            $linhaobra->valor = $linhaobra->quantidade * $linhaobra->servico->precohora;
            $linhaobra->valoriva = ($linhaobra->servico->precohora * $linhaobra->servico->iva->percentagem) / 100;
           // $linhaobra->save();
            $valortotal += $linhaobra->valor;
            $ivatotal += $linhaobra->valoriva * $linhaobra->quantidade;
        }
        $folhaobra->valortotal = $valortotal;
        $folhaobra->ivatotal = $ivatotal;
        if ($folhaobra->is_valid()) {
            $folhaobra->save();
            //redirecionar para o index
            $this->redirectToRoute('folhaobra', 'edit',['id' => $id]);
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
        $this->redirectToRoute('folhaObra', 'index');
    }
}
