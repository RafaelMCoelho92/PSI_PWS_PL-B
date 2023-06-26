<?php
class User extends \ActiveRecord\Model
{
    static $validates_presence_of = array(
        array('username'),
        array('password'),
        array('email'),
        array('telefone'),
        array('nif'),
        array('morada'),
        array('codigopostal'),
        array('localidade'),
        array('role'),
    );
    static $validates_size_of = array(
        array('telefone', 'is' => 9, 'message' => 'O telefone tem de possuir 9 dígitos.'),
        array('nif', 'is' => 9, 'message' => 'O NIF tem de possuir 9 dígitos.'),
        array('codigopostal', 'is' => 7, 'message' => 'O codigo Postal deve possuir 7 dígitos'),

    );
    static $validates_numericality_of = array(
        array('nif', 'only_integer' => true),
        array('telefone', 'only_integer' => true),

    );

    static $validates_uniqueness_of = array(
        array('nif', 'message' => 'Este NIF já está em uso.'),
    );

    static $validates_inclusion_of = array(
        array('role', 'in' => array('Cliente', 'Funcionario', 'Admin')),
    );
}
