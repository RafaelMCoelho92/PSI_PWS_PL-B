<?php
class Iva extends \ActiveRecord\Model
{
    static $validates_presence_of = array(
        array('emvigor'),
        array('descricao'),
        array('percentagem'),
    );


    static $validates_size_of = array(
        array('percentagem', 'maximum' => 2, 'message' => 'Máximo 2 caracteres.'),
    );

    static $validates_numericality_of = array(
        array('percentagem', 'only_integer' => true)
    );
}
