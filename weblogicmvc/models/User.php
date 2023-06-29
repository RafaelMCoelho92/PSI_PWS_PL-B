<?php
class User extends \ActiveRecord\Model
{
    static $validates_presence_of = array(
        array('username', 'message' => 'Insira o nome'),
        array('password', 'message' => 'Insira a password'),
        array('email', 'message' => 'Insira o email'),
        array('telefone', 'message' => 'Insira o telefone'),
        array('nif', 'message' => 'Insira o NIF'),
        array('morada', 'message' => 'Insira a morada'),
        array('codigopostal', 'message' => 'Insira o codigo postal'),
        array('localidade', 'message' => 'Insira a localidade'),
        array('role', 'message' => 'Selecione um Role'),
    );
    static $validates_size_of = array(
        array('telefone', 'is' => 9, 'message' => 'O telefone tem de possuir 9 dígitos.'),
        array('nif', 'is' => 9, 'message' => 'O NIF tem de possuir 9 dígitos.'),
        array('codigopostal', 'is' => 7, 'message' => 'O codigo Postal deve possuir 7 dígitos'),

    );
    static $validates_numericality_of = array(
        array('nif', 'only_integer' => true),
        array('telefone', 'only_integer' => true),
        array('telefone', 'greater_than_or_equal_to' => 0, 'message' => 'O valor tem de ser superior ou igual a 0.'),
        array('codigopostal', 'greater_than_or_equal_to' => 0, 'message' => 'O valor tem de ser superior ou igual a 0.'),
        array('nif', 'greater_than_or_equal_to' => 0, 'message' => 'O valor tem de ser superior ou igual a 0.')

    );

    static $validates_uniqueness_of = array(
        array('nif', 'message' => 'Este NIF já está em uso.'),
        array('email', 'message' => 'Este email já está em uso por outro utiizador.')
    );

    static $validates_inclusion_of = array(
        array('role', 'in' => array('Cliente', 'Funcionario', 'Admin')),
    );
}
