<?php
class Service extends \ActiveRecord\Model
{
    static $validates_presence_of = array(
        array('taxa'),
    );

    static $validates_inclusion_of = array(
        array('taxa', 'in' => array(23, 13, 6, /* temos depois de decidir qual introduzir, sao obrigatorias 4*/)),
    );

    static $validates_size_of = array(
        array('taxa', 'maximum' => 2, 'message' => 'Máximo 2 caracteres.'),
    );

    static $validates_numericality_of = array(
        array('taxa', 'only_integer' => true)
    );
}
