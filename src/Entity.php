<?php
class Entity
{
    private $_EntityName = 'The creature';
    private $_HasBeenNamed = false;
    private $_foodType;
    public function __construct($foodType)
    {
        $this->_foodType = $foodType;
    }
    public function NameCreature($newName)
    {
        $this->_EntityName = $newName;
    }

    public function get_HasBeenNamed()
    {
        return $this->_HasBeenNamed;
    }

    /**
     * Get the value of _EntityName
     */
    public function get_EntityName()
    {
        return $this->_EntityName;
    }

    public function set_EntityName(...$_EntityName)
    {
        if ($_EntityName & isset($_EntityName)) {
            $this->_EntityName = $_EntityName[0];
            
        }

        $this->_HasBeenNamed = true;

        return $this;
    }

    public function RenderEntityStatus(){
        $s = <<<e
        <br>
    $this->_EntityName is all good.<br>
e;
        return($s);
    }
}
