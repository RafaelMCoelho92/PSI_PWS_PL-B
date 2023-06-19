<?php
require_once 'models/FolhaObra.php';
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

        $this->renderView('folhaObra', 'create', ['folhasObra' => $empresas, 'folhasObra' => $ivas, 'folhaObra' => $services, 'folhasObra' => $users]);
    }
}
