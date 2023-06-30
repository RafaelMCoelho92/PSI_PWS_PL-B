<?php
class Task extends \ActiveRecord\Model
{
    static $validates_presence_of = array(
        array('description', 'message' => 'Insira uma descrição'),
        array('done', 'message' => 'Selecione se esta ativa ou não '),

    );
    static $belongs_to = array(
        array('user', 'class_name' => 'User', 'foreign_key' => 'user_id'),
    );
}