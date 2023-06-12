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
            $this->renderView('folhaObra', 'show', ['folhasObra' => $folhaObra]);
        }
    }
}
