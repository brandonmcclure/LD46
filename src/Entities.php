<?php
require_once 'Entity.php';
require_once 'foodTypes.php';

class EntityRepository
{
    protected $Entities = array();
    public function __construct()
    {
        

        $FoodTypeRepository = $_SESSION['FoodTypeRepository'];
        $this->Entities = array(
            new Entity($FoodTypeRepository->GetFoodType("Metal")),
            new Entity($FoodTypeRepository->GetFoodType("Space Plankton"))
        );
    }
    public function GetRandomEntity(){
        $m = sizeof($this->Entities);
        $i = rand(0,$m-1);
        return($this->Entities[$i]);
    }
}