<?php

class Folhaobra extends \ActiveRecord\Model
{
    static $validates_presence_of = array(

        //Validações abaixo não são precisas porque são inseridas automaticamente pelo programa

        //array('data', 'message' => 'Tem de possuir data'),
        //array('valortotal','message' => 'Tem de possuir um valor total'),
        //array('ivatotal','message' => 'Tem de possuir um iva total'),
        //array('estado','message' => 'Tem de possuir estado'),
        //array('idclientes','message' => 'Tem de possuir um id do cliente'),
        //array('idfuncionario','message' => 'Tem de possuir um id do funcionario'),
    );

    static $validates_numericality_of = array(
        array('valortotal', 'greater_than_or_equal_to' => 0),
        array('ivatotal', 'greater_than_or_equal_to' => 0),
    );
    static $belongs_to = array(
        array('user', 'class_name' => 'User', 'foreign_key' => 'idcliente'),
        array('funcionario', 'class_name' => 'User', 'foreign_key' => 'idfuncionario')
    );

    static $has_many = array(
        array('linhaobras')// , 'class_name' => 'Linhaobra', 'foreign_key' => 'idfolhaobra')
    );
    function storeFolha($id)
    {
        $user = User::find($id);
        $folhaobra = new Folhaobra();
        $folhaobra->idcliente = $user->id;
        $funcionario = new Auth();
        $idfuncionario = $funcionario->getId();
        $folhaobra->idfuncionario = $idfuncionario;
        $folhaobra->data = date('d-m-Y H:i:s');
        $folhaobra->valortotal = 0;
        $folhaobra->ivatotal = 0;
        $folhaobra->subtotal = 0;
        return $folhaobra;
    }
    function updateFolha($id)
    {
        $folhaobra = Folhaobra::find($id);
        $ivatotal = 0;
        $subtotal = 0;
        $linhaobras = Linhaobra::find_all_by_idfolhaobra($folhaobra->id);

        foreach ($linhaobras as $linhaobra) {
            $subtotal += $linhaobra->quantidade * $linhaobra->servico->precohora;
            $linhaobra->valoriva = ($linhaobra->servico->precohora * $linhaobra->servico->iva->percentagem) / 100;
            $ivatotal += $linhaobra->valoriva * $linhaobra->quantidade;
        }
        $folhaobra->subtotal = $subtotal;
        $folhaobra->ivatotal = $ivatotal;
        $folhaobra->valortotal = $subtotal + $ivatotal;
        return $folhaobra;
    }
}
