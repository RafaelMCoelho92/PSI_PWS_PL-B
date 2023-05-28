<?php
class Empresa extends \ActiveRecord\Model
{
    static $validates_presence_of = array(
        array('designacaosocial'),
        array('capitalsocial'),
        array('codigopostal'),
        array('email'),
        array('localidade'),
        array('morada'),
        array('telefone'),
        array('nif', 'message' => 'It must be provided')
    );
}
