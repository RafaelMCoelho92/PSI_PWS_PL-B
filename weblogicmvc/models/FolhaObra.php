<?php

class Folhaobra extends \ActiveRecord\Model
{
    static $validates_presence_of = array(
        //array('data'),
        //array('valortotal'),
        //array('ivatotal'),
        //array('estado'),
        //array('idclientes'),
        //array('idfuncionario'),
    );

    static $validates_numericality_of = array(
        //array('data', 'only_date' => true), // only date n existe
        array('valortotal', 'greater_than_or_equal_to' => 0),
        array('ivatotal', 'greater_than_or_equal_to' => 0),
    );
    static $belongs_to = array(
        array('user', 'class_name' => 'User', 'foreign_key' => 'idcliente'),
        array('funcionario', 'class_name' => 'User', 'foreign_key' => 'idfuncionario')
    );

    static $has_many = array(
        array('linhaobra')
    );
}
