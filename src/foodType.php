<?php

class foodType
{
    private $_name;

    public function __construct($name)
    {
        $this->_name = $name;
    }
    /**
     * Get the value of _name
     */ 
    public function get_name()
    {
        return $this->_name;
    }
}