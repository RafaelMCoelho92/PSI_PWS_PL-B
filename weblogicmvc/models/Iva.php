<?php
class Iva extends \ActiveRecord\Model
{
    static $validates_presence_of = array(
        array('emvigor'),
        array('descricao'),
        array('percentagem'),
    );

    static $validates_size_of = array(
        array('percentagem', 'maximum' => 6, 'message' => 'Máximo 2 caracteres.'), // 6 porque 100.00 ok?
    );

    static $validates_numericality_of = array(
        array('percentagem', 'greater_than_or_equal_to' => 0) // penso n fazer sentido ser negativo
    );
}
