<?php

class LinhaFatura extends ActiveRecord\Model
{
    static $validates_presence_of = array(
        array('quantidade', 'message' => 'It must be provided'),
    );

    static $validates_numericality_of = array(
        array('quantidade', 'greater_than' => 0),
    );

    static $has_one = array(
        array('produto'),
   );
}