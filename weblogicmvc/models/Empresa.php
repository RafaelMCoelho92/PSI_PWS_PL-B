<?php
class Empresa extends \ActiveRecord\Model
{
    static $validates_presence_of = array(
        array('designacaosocial', 'message' => 'Foneça a designação social'),
        array('capitalsocial', 'message' => 'Foneça o capital social'),
        array('codigopostal', 'message' => 'Foneça um Codigo Postal'),
        array('email', 'message' => 'Foneça um email'),
        array('localidade', 'message' => 'Foneça uma localidade'),
        array('morada', 'message' => 'Foneça uma morada'),
        array('telefone', 'message' => 'Foneça um telefone'),
        array('nif', 'message' => 'Foneça um nif')
    );
    static $validates_size_of = array(
        array('telefone', 'is' => 9, 'message' => 'O telefone tem de possuir 9 dígitos.'),
        array('nif', 'is' => 9, 'message' => 'O NIF tem de possuir 9 dígitos.'),
        array('codigopostal', 'is' => 7, 'message' => 'O codigo Postal deve possuir 7 dígitos'),

    );
}
