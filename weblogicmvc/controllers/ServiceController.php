<?php
require_once 'models/Service.php';
require_once 'models/Iva.php';
require_once 'Controller.php';

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::all();
        //mostrar a vista index passando os dados por parâmetro
        $this->renderView('service', 'index', ['services' => $services]);
    }

    public function show($id)
    {
        //mostra vista com detalhes
        $service = Service::find($id);
        if (is_null($service)) {
            //TODO redirect to standard error page
        } else {
            //mostrar a vista show passando os dados por parâmetro
            $this->renderView('service', 'show', ['service' => $service]);
        }
    }

    public function create()
    {
        //mostra vista com form de criacao de registo
        $ivas = Iva::all();
        $this->renderView('service', 'create', ['ivas' => $ivas]);
    }

    public function store()
    {
        //recebe os dados do form de criacao valida e persiste na BD
        $ivas = Iva::all();
        $service = new Service($this->getHTTPPost());
        if ($service->is_valid()) {
            $service->save();
            //redirecionar para o index dos serviços
            $this->redirectToRoute('service', 'index');
        } else {
            //mostrar vista create passando o modelo como parâmetro
            $this->renderView('service', 'create', ['service' => $service, 'ivas' => $ivas]);
        }
    }

    public function edit($id)
    {
        //mostra a vista com form de edicao de um registo identificado pelo seu ID
        $ivas = Iva::all();
        $service = Service::find($id);
        if (is_null($service)) {
            //TODO redirect to standard error page
           // $this->renderView('service', 'index', ['service' => $service]);
        } else {
            //mostrar a vista edit passando os dados por parâmetro
            $this->renderView('service', 'edit', ['service' => $service, 'ivas' => $ivas]);
        }
    }

    public function update($id)
    {
        // recebe os dados do form de edicao de um registo identificado pelo seu id valida e persiste na BD
        $service = Service::find($id);
        $service->update_attributes($this->getHTTPPost());
        $service->precohora="adsdasda";
        if ($service->is_valid()) {
            var_dump($service->errors);
            die();
            $service->save();
            //redirecionar para o index
            $this->redirectToRoute('service', 'index');
        } else {
            //mostrar vista edit passando o modelo como parâmetro
            $this->renderView('service', 'edit', ['service' => $service]);
        }
    }

    public function delete($id)
    {
        //apaga um registo da BD identificado pelo ID
        $service = Service::find($id);
        $service->delete();
        //redirecionar para o index
        $this->redirectToRoute('service', 'index');
    }
}
