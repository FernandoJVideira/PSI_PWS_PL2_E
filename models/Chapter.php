<?php

class Chapter extends \ActiveRecord\Model
{
    static $validates_presence_of = array(
        array('name', 'message' => 'It must be provided'),
    );

    static $belongs_to = array(
        array('book')
    );
}