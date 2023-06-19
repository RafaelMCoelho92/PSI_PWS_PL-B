<?php
require_once 'models/FolhaObra.php';
require_once 'models/Service.php';
require_once 'models/Iva.php';
require_once 'Controller.php';

class FolhaObraController extends Controller
{
    public function index()
    {
        $folhasObra = FolhaObra::all();
        $this->renderView('folhaObra', 'index', ['folhasObra' => $folhasObra]);
    }

    public function show($id)
    {
        $folhaObra = FolhaObra::find($id);
        if (is_null($$folhaObra)) {
            //TODO redirect to standard error page
        } else {
            //mostrar a vista show passando os dados por parâmetro
            $this->renderView('folhaObra', 'show', ['folhaObra' => $folhaObra]);
        }
    }

    public function create()
    {
        //mostra vista com form de criacao de registo
        $empresas = Empresa::all();
        $ivas = Iva::all();
        $services = Service::all();
        $users = User::all();

        $this->renderView('folhaObra', 'create', ['folhasObra' => $empresas, $ivas, $services, $users]);
    }

    public function store()
    {
        //recebe os dados do form de criacao valida e persiste na BD
        $empresas = Empresa::all();
        $ivas = Iva::all();
        $services = Service::all();
        $users = User::all();
        $folhaObra = new FolhaObra($this->getHTTPPost());
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
        $folhaObra = FolhaObra::find($id);
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
        $folhaObra = FolhaObra::find($id);
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
        $folhaObra = FolhaObra::find($id);
        $folhaObra->delete();
        //redirecionar para o index
        $this->redirectToRoute('folhaObra', 'index');
    }
}
