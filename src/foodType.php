<?php

class foodType
{
    private $_name;
    private $_chanceOfFindingFood;

    public function __construct($name,$chanceOfFindingFood)
    {
        $this->_name = $name;
        $this->_chanceOfFindingFood = $chanceOfFindingFood;
    }
    /**
     * Get the value of _name
     */ 
    public function get_name()
    {
        return $this->_name;
    }

    /**
     * Get the value of _chanceOfFindingFood
     */ 
    public function get_chanceOfFindingFood()
    {
        return $this->_chanceOfFindingFood;
    }

    public function GetString(){
        
    }
}
