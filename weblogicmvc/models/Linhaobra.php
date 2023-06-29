<?php

class Linhaobra extends \ActiveRecord\Model
{
    static $validates_presence_of = array(
        // O resto a exepção do idservico é tudo automatico tambem
        array('quantidade', 'message' => 'Insira uma quantidade'),
    );

    static $belongs_to = array(
        array('folhaobra', 'class_name' => 'Folhaobra', 'foreign_key' => 'idfolhaobra'),
        array('servico', 'class_name' => 'Service', 'foreign_key' => 'idservico')
    );
    static $validates_numericality_of = array(
        array('quantidade', 'greater_than_or_equal_to' => 0,'message' => 'O valor tem de ser superior ou igual a 0.') // penso n fazer sentido ser negativo
    );
}