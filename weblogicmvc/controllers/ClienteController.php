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
        $folhaobra = Folhaobra::find('all', array('conditions' => array('idcliente = ?', $id)));
        $this->renderView('cliente', 'folhaobraindex', ['folhasObra' => $folhaobra,], 'frontoffice');
    }
}
