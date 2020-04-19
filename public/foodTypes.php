<?php
require_once 'foodType.php';
class FoodTypeRepository
{
    protected $foodTypes = array();

    public function __construct()
    {
        $this->foodTypes = array(
            new foodType("Metal"),
            new foodType("Space Plankton"),
            new foodType("None")
        );
    }

    public function GetFoodType($name){
        foreach ($this->foodTypes as $t){
            if($t->get_name() == $name){
                return $t;
            }
        }
    }
}