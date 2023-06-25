<?php
require_once 'models/Folhaobra.php';
require_once 'models/Service.php';
require_once 'models/Iva.php';
require_once 'models/Empresa.php';
require_once 'Controller.php';

class LinhaobraController extends Controller
{
    public function create($id)
    {
        $folhaobra = Folhaobra::find($id);
        $services = Service::all();
        $empresas = Empresa::first();


// redirect para o edit
        //$this->renderView('linhaobra', 'create', ['folhaobra' => $folhaobra, 'empresas' => $empresas,  'services' => $services]); // iva ja esta associado ao serviço em principio n precisa de aparecer aqui 'ivas'=>$ivas, users vai estar associado a folhaobra , 'users'=>$users

    }
}