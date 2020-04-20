<?php
require_once 'foodType.php';
class FoodTypeRepository
{
    protected $foodTypes = array();

    public function __construct()
    {
        $this->foodTypes = array(
            new foodType("Metal",0.5),
            new foodType("Space Plankton",0.5),
            new foodType("Blue Giant Solar Energy",0.75),
            new foodType("Rock",0.5),
            new foodType("None",0.0)
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
