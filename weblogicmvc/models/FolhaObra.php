<?php

class Folhaobra extends \ActiveRecord\Model
{
    static $validates_presence_of = array(
        array('id'),
        array('data'),
        array('valortotal'),
        array('ivatotal'),
        array('estado'),
        array('idclientes'),
        array('idfuncionario'),
    );

    static $validates_numericality_of = array(
        array('data', 'only_date' => true),
        array('valortotal', 'only_float' => true),
        array('ivatotal', 'only_float' => true),
    );

    static $belongs_to = array(
        array('linhaObra') // vai estar relacionado com uma linha de obra???
    );
}
