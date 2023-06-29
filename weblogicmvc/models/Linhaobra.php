<?php

class Linhaobra extends \ActiveRecord\Model
{
    static $belongs_to = array(
        array('folhaobra', 'class_name' => 'Folhaobra', 'foreign_key' => 'idfolhaobra'),
        array('servico', 'class_name' => 'Service', 'foreign_key' => 'idservico')
    );
    static $validates_numericality_of = array(
        array('quantidade', 'greater_than_or_equal_to' => 0,'message' => 'O valor tem de ser superior ou igual a 0.') // penso n fazer sentido ser negativo
    );
}