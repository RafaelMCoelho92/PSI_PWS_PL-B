<?php
require_once 'Controller.php';
class ClienteController extends Controller
{
    public function __construct()
    {
        $this->authorizationFilter(['Cliente']);
    }
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
        $this->redirectToRoute('cliente', 'folhaobraindex', ['id' => $folhaobra->idcliente], 'frontoffice');
    }

    public function folhaobrapaga($id)
    {
        $folhaobra = Folhaobra::find('all', array('conditions' => array('idcliente = ? and estado = ? ', $id, 'Paga')));
        $this->renderView('cliente', 'folhaobraindex', ['folhasObra' => $folhaobra,], 'frontoffice');
    }

    public function folhaobraemitida($id)
    {
        $folhaobra = Folhaobra::find('all', array('conditions' => array('idcliente = ? and estado = ? ', $id, 'Emitida')));
        $this->renderView('cliente', 'folhaobraindex', ['folhasObra' => $folhaobra,], 'frontoffice');
    }

    public function edit()
    {
        $auth = new Auth;
        $id = $auth->getId();
        $user = User::find_by_id($id);
        $this->renderView('cliente', 'edit', ['user' => $user], 'frontoffice');
    }

    public function search_cliente()
    {
        $pesquisa = $this->getHTTPPostParam('pesquisa');

        if (!empty($pesquisa)) {
            if ($folhaobras = Folhaobra::find_all_by_estado($pesquisa) != null) {
                $folhaobras = Folhaobra::find_all_by_estado($pesquisa);
                $this->renderView('cliente', 'folhaobraindex', ['folhasObra' => $folhaobras], 'frontoffice');
            } elseif ($folhaobras = Folhaobra::find_all_by_id($pesquisa) != null) {
                $folhaobras  = Folhaobra::find_all_by_id($pesquisa);
                $this->renderView('cliente', 'folhaobraindex', ['folhasObra' => $folhaobras], 'frontoffice');
            } else {
                $auth = new Auth;
                $id = $auth->getId();
                $user = User::find_by_id($id);
                $folhaobras = Folhaobra::find_all_by_id($user->id);
                $this->renderView('cliente', 'folhaobraindex', ['folhasObra' => $folhaobras], 'frontoffice');
            }
        } else {
            $auth = new Auth;
            $id = $auth->getId();
            $user = User::find_by_id($id);
            $this->redirectToRoute('cliente', 'folhaobraindex', ['id' => $user->id]);
        }
    }
}
