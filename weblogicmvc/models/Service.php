<?php
class Service extends \ActiveRecord\Model
{
    static $validates_presence_of = array(
        array('referencia'),
        array('descricao'),
        array('precohora'),
    );

    static $validates_size_of = array(
        array('referencia', 'maximum' => 40, 'message' => 'Máximo 40 caracteres.'),
    );

    static $validates_numericality_of = array(
        array('precohora', 'only_float' => true),
    );
}
