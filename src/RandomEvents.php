<?php
require_once 'RandomEvent.php';
require_once 'foodTypes.php';

class RandomEventsHardcodedRepository
{
    protected $RandomEvent = array();

    public function __construct()
    {
        $FoodTypeRepository = $_SESSION['FoodTypeRepository'];
        $this->RandomEvent = array(
            new RandomEvent(
                "Planet",
                "You see a massive planet before you. It appears to be completly dead, and filled with large deposits of what looks to be metal.",
                $FoodTypeRepository->GetFoodType("Space Plankton")
            ),
            new RandomEvent(
                "Planet",
                "The planet below is covered in lush vegitation, with large bodies of water.",
                $FoodTypeRepository->GetFoodType("none")
            ),
            new RandomEvent(
                "Void",
                "There is nothing in this section of space. The stillness gives you chills.",
                $FoodTypeRepository->GetFoodType("none")
            ),
            new RandomEvent(
                "Debris",
                "You encounter a large reckage of space ships, it appears a large space battle took place here before.",
                $FoodTypeRepository->GetFoodType("none")
                )
            );
    }
    public function GetRandomEvent(){
        $m = sizeof($this->RandomEvent);
        $i = rand(0,$m-1);
        return($this->RandomEvent[$i]);
    }
}