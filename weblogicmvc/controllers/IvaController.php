<?php
require_once 'models/Iva.php';
require_once 'Controller.php';

class IvaController extends Controller
{
    public function index()
    {
        $ivas = Iva::all();
        // Mostrar a vista index passando os dados por parâmetro
        $this->renderView('iva', 'index', ['ivas' => $ivas]);
    }
    public function show($id)
    {
        // Mostrar vista com detalhes
        $iva = Iva::find($id);
        if (is_null($iva)) {
            // TODO: Redirecionar para página de erro padrão
        } else {
            // Mostrar a vista show passando os dados por parâmetro
            $this->renderView('iva', 'show', ['iva' => $iva]);
        }
    }

    public function create()
    {
        // Mostrar vista com formulário de criação de registo
        $this->renderView('iva', 'create');
    }

    public function store()
    {
        // Receber os dados do formulário de criação, validar e persistir no BD
        $iva = new Iva($this->getHTTPPost());
        if ($iva->is_valid()) {
            $iva->save();
            // Redirecionar para o index das IVA
            $this->redirectToRoute('iva', 'index');
        } else {
            // Mostrar vista create passando o modelo como parâmetro
            $this->renderView('iva', 'create', ['iva' => $iva]);
        }
    }

    public function edit($id)
    {
        // Mostrar a vista com formulário de edição de um registo identificado pelo seu ID
        $iva = Iva::find($id);
        if (is_null($iva)) {
            // TODO: Redirecionar para página de erro padrão
            $this->renderView('iva', 'index', ['iva' => $iva]);
        } else {
            // Mostrar a vista edit passando os dados por parâmetro
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
            // Redirecionar para o index
            $this->redirectToRoute('iva', 'index');
        } else {
            // Mostrar vista edit passando o modelo como parâmetro
            $this->renderView('iva', 'edit', ['iva' => $iva]);
        }
    }

    public function delete($id)
    {
        // Apagar um registo do BD identificado pelo ID
        $iva = Iva::find($id);
        $iva->delete();
        // Redirecionar para o index
        $this->redirectToRoute('iva', 'index');
    }
}
