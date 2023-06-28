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
        $linhaObras = Linhaobra::find_all_by_idfolhaobra($id);
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
        $folhaobra = Folhaobra::find_all_by_idcliente_and_estado($id, 'Paga');
        $this->renderView('cliente', 'folhaobraindex', ['folhasObra' => $folhaobra,], 'frontoffice');
    }

    public function folhaobraemitida($id)
    {
        $folhaobra = Folhaobra::find_all_by_idcliente_and_estado($id, 'Emitida');
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
    
        $auth = new Auth;
        $idCliente = $auth->getId();
    
        $conditions = array('conditions' => array(
                '((estado LIKE ? OR id LIKE ?) AND idcliente = ? AND estado != ? AND estado != ?)',// tive que usar ajuda do chat nesta que com as cenas do activerecord n estava a chegar la, mas basta olhar para como esta o search q da logo para perceber
                "%$pesquisa%","%$pesquisa%",$idCliente,'Em Lançamento','Anulada'));
    
        $folhaobras = Folhaobra::all($conditions);
    
        if (!empty($folhaobras)) {
            $this->renderView('cliente', 'folhaobraindex', ['folhasObra' => $folhaobras], 'frontoffice');
        } else {
            $this->redirectToRoute('cliente', 'folhaobraindex', ['id' => $idCliente]);
        }
    }
    public function imprimir($id){
        $empresa = Empresa::first();
        $folhaobra = Folhaobra::find($id);
        $linhaObras = Linhaobra::find_all_by_idfolhaobra($id);
        $this->renderView('cliente', 'folhaobraimprimir', ['folhaObra' => $folhaobra, 'empresa' => $empresa, 'linhaObras' => $linhaObras], 'login');
    }
    
    
    
}
