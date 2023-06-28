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
        $servico = Service::find_by_referencia($this->getHTTPPostParam('referencia'));
        $linhaobra->idservico = $servico->id;
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
            //renderview aqui
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
    public function update($id)
    {
        $linhaobra = Linhaobra::find_by_id($id);
        $novaQuantidade = $this->getHTTPPostParam('quantidade');
        $linhaobra->quantidade = $novaQuantidade;
        $folhaobra = Folhaobra::find($linhaobra->idfolhaobra);
        // falta o isvalid
        $linhaobra->save();// redirect se n for tem q se fazer renderview
        $this->redirectToRoute('folhaobra', 'update', ['id' => $folhaobra->id]);
    }

    public function index($idfolhaobra)
    {
        $empresas = Empresa::first();
        $folhaobra = Folhaobra::find($idfolhaobra);
        $this->renderView('linhaobra', 'index', ['folhaobra' => $folhaobra, 'empresas' => $empresas]);
    }
    public function create($idfolhaobra, $idservico)
    {
        $empresas = Empresa::first();
        $folhaobra = Folhaobra::find($idfolhaobra);
        $servico = Service::find($idservico);
        $linhaobras = Linhaobra::find_all_by_idfolhaobra($folhaobra->id);
        $this->renderView('linhaobra', 'create', ['folhaobra' => $folhaobra, 'servico' => $servico, 'empresas' => $empresas, 'linhaobras' => $linhaobras]);
    }
    public function edit($id)
    {
        $auth = new Auth();
        $role = $auth->getRole();

        $services = Service::all();
        $empresa = Empresa::first();
        $linhaobra = Linhaobra::find($id);

        $folhaobra = Folhaobra::find($linhaobra->idfolhaobra);
        if ($folhaobra->estado  == "Emitida" || $folhaobra->estado  == "Paga") {
            $this->redirectToRoute('folhaobra', 'index');
        } else {
            $linhaobras = Linhaobra::find_all_by_idfolhaobra($folhaobra->id);
            if (is_null($folhaobra)) {
                //TODO redirect to standard error page
            } else {
                //mostrar a vista edit passando os dados por parâmetro
                $this->renderView('linhaobra', 'edit', ['folhaobra' => $folhaobra, 'empresa' => $empresa, 'linhaobras' => $linhaobras, 'services' => $services]);
            }
        }
    }
    // redirect para o edit
    //$this->renderView('linhaobra', 'create', ['folhaobra' => $folhaobra, 'empresas' => $empresas,  'services' => $services]); // iva ja esta associado ao serviço em principio n precisa de aparecer aqui 'ivas'=>$ivas, users vai estar associado a folhaobra , 'users'=>$users

    //}
}
