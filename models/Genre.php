<?php

class Genre extends \ActiveRecord\Model
{
    static $validates_presence_of = array(
        array('name', 'message' => 'It must be provided'),
    );
}