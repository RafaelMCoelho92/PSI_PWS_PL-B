<?php
class Iva extends \ActiveRecord\Model
{
    static $validates_presence_of = array(
        array('emvigor', 'message' => 'Selecione se esta em vigor ou não '),
        array('descricao', 'message' => 'Insira uma descrição'),
        array('percentagem', 'message' => 'Insira a percentagem'),
    );

    static $validates_size_of = array(
        array('percentagem', 'maximum' => 5, 'message' => 'Máximo 5 caracteres.'), // 5 porque 99.99 ok?
    );

    static $validates_numericality_of = array(
        array('percentagem', 'greater_than_or_equal_to' => 0, 'message' => 'O valor tem de ser superior ou igual a 0.') // penso n fazer sentido ser negativo
    );

    static $validates_uniqueness_of = array(
        array('percentagem', 'message' => 'Este valor de IVA já está em uso.'),
    );
}
