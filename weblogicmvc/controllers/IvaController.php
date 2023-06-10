<?php
require_once 'models/IVA.php';
require_once 'Controller.php';

class IvaController extends Controller
{
    public function index()
    {
        $ivas = IVA::all();
        $this->renderView('iva', 'index', ['ivas' => $ivas]);
    }

    public function show($id)
    {
        $iva = IVA::find($id);
        if (is_null($iva)) {
            // Redirecionar ou exibir mensagem de erro
        } else {
            $this->renderView('iva', 'show', ['iva' => $iva]);
        }
    }

    public function create()
    {
        $this->renderView('iva', 'create');
    }

    public function store()
    {
        $iva = new IVA($this->getHTTPPost());
        if ($iva->is_valid()) {
            $iva->save();
            $this->redirectToRoute('iva', 'index');
        } else {
            $this->renderView('iva', 'create', ['iva' => $iva]);
        }
    }

    public function edit($id)
    {
        $iva = IVA::find($id);
        if (is_null($iva)) {
            // Redirecionar ou exibir mensagem de erro
        } else {
            $this->renderView('iva', 'edit', ['iva' => $iva]);
        }
    }

    public function update($id)
    {
        $iva = IVA::find($id);
        $iva->update_attributes($this->getHTTPPost());
        if ($iva->is_valid()) {
            $iva->save();
            $this->redirectToRoute('iva', 'index');
        } else {
            $this->renderView('iva', 'edit', ['iva' => $iva]);
        }
    }

    public function delete($id)
    {
        $iva = IVA::find($id);
        $iva->delete();
        $this->redirectToRoute('iva', 'index');
    }
}
