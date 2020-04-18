<?php
class Entity
{
    private $_name = 'The creature';
    private $_HasBeenNamed = false;
    private $_foodType;
    public function __construct($foodType)
    {
        $this->_foodType = $foodType;
    }
    public function NameCreature($newName)
    {
        $this->_name = $newName;
    }

    public function get_HasBeenNamed()
    {
        return $this->_HasBeenNamed;
    }

    /**
     * Get the value of _name
     */
    public function get_name()
    {
        return $this->_name;
    }

    public function set_name(...$_name)
    {
        if (isset($_name)) {
            $this->_name = $_name;
            
        }

        $this->_HasBeenNamed = true;
        
        return $this;
    }
}
