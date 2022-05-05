<?php

use ActiveRecord\Model;

class Book extends Model
{
    static $validates_presence_of = array(
        array('name'),
        array('isbn', 'message' => 'It must be provided')
    );
}