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
        $this->renderView('folhaObra', 'create', ['folhaobra' => $folhaobra, 'empresas' => $empresas,  'services' => $services]); // iva ja esta associado ao serviço em principio n precisa de aparecer aqui 'ivas'=>$ivas, users vai estar associado a folhaobra , 'users'=>$users
    }

    public function store()
    {
        //recebe os dados do form de criacao valida e persiste na BD
        $empresas = Empresa::all();
        $ivas = Iva::all();
        $services = Service::all();
        $users = User::all();
        $folhaObra = new Folhaobra($this->getHTTPPost());
        if ($folhaObra->is_valid()) {
            $folhaObra->save();
            //redirecionar para o index das folhas de obra
            $this->redirectToRoute('folhaObra', 'index');
        } else {
            //mostrar vista create passando o modelo como parâmetro
            $this->renderView('folhaObra', 'create', ['folhaObra' => $folhaObra, 'empresas' => $empresas, 'ivas' => $ivas, 'services' => $services, 'users' => $users]);
        }
    }

    public function edit($id)
    {
        //mostra a vista com form de edicao de um registo identificado pelo seu ID
        $empresas = Empresa::all();
        $ivas = Iva::all();
        $services = Service::all();
        $users = User::all();
        $folhaObra = Folhaobra::find($id);
        if (is_null($folhaObra)) {
            //TODO redirect to standard error page
        } else {
            //mostrar a vista edit passando os dados por parâmetro
            $this->renderView('service', 'edit', ['folhaObra' => $folhaObra, 'empresas' => $empresas, 'ivas' => $ivas, 'services' => $services, 'users' => $users]);
        }
    }

    public function update($id)
    {
        // recebe os dados do form de edicao de um registo identificado pelo seu id valida e persiste na BD
        $folhaObra = Folhaobra::find($id);
        $empresas = Empresa::all();
        $ivas = Iva::all();
        $services = Service::all();
        $users = User::all();
        $folhaObra->update_attributes($this->getHTTPPost());
        if ($folhaObra->is_valid()) {
            $folhaObra->save();
            //redirecionar para o index
            $this->redirectToRoute('folhaObra', 'index');
        } else {
            //mostrar vista edit passando o modelo como parâmetro
            $this->renderView('folhaObra', 'edit', ['folhaObra' => $folhaObra, 'empresas' => $empresas, 'ivas' => $ivas, 'services' => $services, 'users' => $users]);
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
