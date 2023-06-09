<?php
class iva extends \ActiveRecord\Model
{
    static $validates_presence_of = array(
        array('percentagem'),
    );

    static $validates_inclusion_of = array(
        array('percentagem', 'in' => array(0.23, 0.13, 0.06, 0)),
    );

    static $validates_size_of = array(
        array('percentagem', 'maximum' => 2, 'message' => 'Máximo 2 caracteres.'),
    );

    static $validates_numericality_of = array(
        array('percentagem', 'only_integer' => true)
    );
}
