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
        array('precohora', 'greater_than_or_equal_to' => 0 ,'message' => 'O valor tem de ser superior ou igual a 0.'), // only float não existe no active record, tropa não se metam a inventar, confirmem as cenas no site https://www.phpactiverecord.org/projects/main/wiki/Validations#validates_format_of 
    );

    static $belongs_to = array(
        array('iva')
    );
}
