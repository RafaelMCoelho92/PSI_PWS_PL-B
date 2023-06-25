<?php
require_once 'models/Folhaobra.php';
require_once 'models/Service.php';
require_once 'models/Iva.php';
require_once 'models/Empresa.php';
require_once 'Controller.php';

class LinhaobraController extends Controller
{
    public function store($id)
    {
        $linhaobra = new Linhaobra();
        $linhaobra->idservico = ($this->getHTTPPostParam('servico'));
        $linhaobra->quantidade = ($this->getHTTPPostParam('quantidade'));
        $linhaobra->idfolhaobra = $id;
        if($linhaobra->is_valid()){  
        $linhaobra->save();
            //redirect para o edit da folha de obra e passa o modelo como parametro
            $this->redirectToRoute('folhaobra', 'edit', $param = $id);
        } else{
            //mostra a vista do edit e passa o modelo como parametro
        }
    }


// redirect para o edit
        //$this->renderView('linhaobra', 'create', ['folhaobra' => $folhaobra, 'empresas' => $empresas,  'services' => $services]); // iva ja esta associado ao serviço em principio n precisa de aparecer aqui 'ivas'=>$ivas, users vai estar associado a folhaobra , 'users'=>$users

    //}
}