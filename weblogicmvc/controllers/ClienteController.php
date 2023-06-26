<?php
require_once 'Controller.php';
class ClienteController extends Controller
{
    public function empresa()
    {
        $empresa = Empresa::all();
        $this->renderView('cliente', 'empresa', ['empresa' => $empresa], 'frontoffice');
    }


    public function folhaobraindex($id)
    {
        $folhaobra = Folhaobra::find('all', array('conditions' => array('idcliente = ? and estado != ? and estado != ?', $id, 'Anulada', 'Em Lançamento')));
        $this->renderView('cliente', 'folhaobraindex', ['folhasObra' => $folhaobra,], 'frontoffice');
    }

    public function folhaobrashow($id)
    {
        $empresa = Empresa::first();
        $folhaobra = Folhaobra::find($id);
        $linhaObras = Linhaobra::find('all', array('conditions' => array('idfolhaobra = ?', $id)));
        $this->renderView('cliente', 'folhaobrashow', ['folhaObra' => $folhaobra, 'empresa' => $empresa, 'linhaObras' => $linhaObras], 'frontoffice');
    }

    public function pagar($id)
    {
        $folhaobra = Folhaobra::find($id);
        if ($folhaobra->estado == 'Emitida') {
            $folhaobra->estado = 'Paga';
            $folhaobra->save();
        }
        $this->redirectToRoute('cliente', 'folhaobraindex', ['id' => $folhaobra->idcliente]);
    }
}
