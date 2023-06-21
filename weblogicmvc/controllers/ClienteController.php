<?php
require_once 'Controller.php';
 class ClienteController extends Controller{
    public function empresa(){
        $empresa= Empresa::all();
        $this->renderView('cliente','empresa', ['empresa'=>$empresa],'frontoffice');
    }


    public function folhaobra(){
        //querry p/ ir buscar as folhas de obra de um cliente autenticado findbyclientid(id)
    }

}