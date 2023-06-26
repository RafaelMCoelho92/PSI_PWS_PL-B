<?php
require_once 'models/Folhaobra.php';
require_once 'models/Service.php';
require_once 'models/Iva.php';
require_once 'models/Empresa.php';
require_once 'Controller.php';

class LinhaobraController extends Controller
{
    public function __construct()
    {
        $this->authorizationFilter(['Funcionario', 'Admin']);
        //Ele chama o método authorizationFilter(['Funcionario','Admin']) definido na classe Controller. 
        //Esse método verifica se o usuário está autenticado como "Funcionario" ou "Admin". 
        //Caso contrário, o usuário é redirecionado para uma rota de acesso inválido.
    }
    public function store($id) // recebe o id da folha de obra
    {
        $linhaobra = new Linhaobra();
        $linhaobra->idservico = ($this->getHTTPPostParam('servico'));
        $linhaobra->quantidade = ($this->getHTTPPostParam('quantidade'));
        $linhaobra->valor = $linhaobra->quantidade * $linhaobra->servico->precohora;
        $linhaobra->valoriva = ($linhaobra->servico->precohora * $linhaobra->servico->iva->percentagem) / 100;
        $linhaobra->idfolhaobra = $id;
        if ($linhaobra->is_valid()) {
            $linhaobra->save();
            //redirect para o update da folha de obra e passa o id como parametro
            $this->redirectToRoute('folhaobra', 'update', ['id' => $id]);
        } else {
            //mostra a vista do edit e passa o modelo como parametro
        }
    }
    public function delete($id)
    {

        //apaga um registo da BD identificado pelo ID
        $linhaobra = Linhaobra::find($id);
        $linhaobra->delete();
        //redirecionar 
        $this->redirectToRoute('folhaobra', 'update', ['id' => $linhaobra->idfolhaobra]);
    }


    // redirect para o edit
    //$this->renderView('linhaobra', 'create', ['folhaobra' => $folhaobra, 'empresas' => $empresas,  'services' => $services]); // iva ja esta associado ao serviço em principio n precisa de aparecer aqui 'ivas'=>$ivas, users vai estar associado a folhaobra , 'users'=>$users

    //}
}
