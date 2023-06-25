<?php

class Linhaobra extends \ActiveRecord\Model
{
    static $belongs_to = array(
        array('folhaobra', 'class_name' => 'Folhaobra', 'foreign_key' => 'idfolhaobra'),
        array('servico', 'class_name' => 'Service', 'foreign_key' => 'idservico')
    );
}