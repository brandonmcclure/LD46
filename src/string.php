<?php
class GameString
{
    protected $_name;
    protected $_type;
    protected $_value;

    public function __construct($name,$type, $value)
    {
        $this->_name = $name;
        $this->_type = $type;
        $this->_value = $value;
    }

    /**
     * Get the value of _name
     */ 
    public function get_name()
    {
        return $this->_name;
    }

    /**
     * Get the value of _type
     */ 
    public function get_type()
    {
        return $this->_type;
    }

    /**
     * Get the value of _value
     */ 
    public function get_value()
    {
        return $this->_value;
    }
}
