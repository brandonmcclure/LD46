<?php
class Entity
{
    private $_EntityName = 'The creature';
    private $_HasBeenNamed = false;
    private $_foodType;
    private $_LifeForce = 10;
    private $_HungerLevel = 5;

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
        if ($this->_HungerLevel > 8){
            $hungerStatus = "stuffed";
        }
        elseif($this->_HungerLevel > 4){
            $hungerStatus = "satiated";
        }
        elseif($this->_HungerLevel > 2){
            $hungerStatus = "hungry";
        }
        elseif($this->_HungerLevel >= 0){
            $hungerStatus = "starving";
        }
        $s = <<<e
        <br>
    $this->_EntityName is $hungerStatus.<br>
e;
        return($s);
    }

    /**
     * Get the value of _LifeForce
     */ 
    public function get_LifeForce()
    {
        return $this->_LifeForce;
    }

    /**
     * Get the value of _HungerLevel
     */ 
    public function get_HungerLevel()
    {
        return $this->_HungerLevel;
    }

    /**
     * Set the value of _LifeForce
     *
     * @return  self
     */ 
    public function set_LifeForce($_LifeForce)
    {
        $this->_LifeForce = $_LifeForce;

        return $this;
    }

    /**
     * Set the value of _HungerLevel
     *
     * @return  self
     */ 
    public function set_HungerLevel($_HungerLevel)
    {
        $this->_HungerLevel = $_HungerLevel;

        return $this;
    }

    public function Decrement_LifeForce(){
        //Would be cool to have the rate of the _LifeForce decrease along with the hunger and possibly other attributes. IE an hungery, angry creature will have it's life force devolve faster then a well fed, happy one.
        $this->_LifeForce = $this->_LifeForce-1;
    }

    public function Decrement_Hunger(){
        if($this->_HungerLevel > 0){
            $this->_HungerLevel = $this->_HungerLevel-1;
        }
    }

    /**
     * Get the value of _foodType
     */ 
    public function get_foodType()
    {
        return $this->_foodType;
    }

    public function Feed(){
        $this->_HungerLevel = $this->_HungerLevel +2;
    }

    public function RenderGameEntityDescription(){
        $outString = "";
        
        if ($this->_foodType == $_SESSION['FoodTypeRepository']->GetFoodType("Metal")){
            $outString = <<<e
The creature eats metal
e;
        }

        if ($this->_foodType == $_SESSION['FoodTypeRepository']->GetFoodType("Space Plankton")){
            $outString = <<<e
The creature eats Space Plankton
e;
        }

        if ($this->_foodType == $_SESSION['FoodTypeRepository']->GetFoodType("Blue Giant Solar Energy")){
            $outString = <<<e
The creature eats Blue Giant Solar Energy
e;
        }

        if ($this->_foodType == $_SESSION['FoodTypeRepository']->GetFoodType("Rock")){
            $outString = <<<e
The creature eats Rock
e;
        }
        return $outString;
    }
}
