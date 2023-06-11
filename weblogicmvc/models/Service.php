<?php
class Service extends \ActiveRecord\Model
{
    static $validates_presence_of = array(
        array('referencia'),
        array('descricao'),
        array('precohora'),
        array('iva'),
    );

    static $validates_size_of = array(
        array('referencia', 'maximum' => 20, 'message' => 'Máximo 20 caracteres.'),
        array('descricao', 'maximum' => 50, 'message' => 'Máximo 50 caracteres.'),
    );

    static $validates_numericality_of = array(
        array('precohora', 'only_float' => true),
    );

    static $belongs_to = array(
        array('iva')
    );
}
