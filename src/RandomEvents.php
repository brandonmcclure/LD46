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
                "FoodChance",
                "You see a massive planet before you. It appears to be completly dead, and filled with large deposits of what looks to be metal.",
                $FoodTypeRepository->GetFoodType("Space Plankton")
            ),
            new RandomEvent(
                "Planet",
                "FoodChance",
                "The planet below is covered in lush vegitation, with large bodies of water.",
                $FoodTypeRepository->GetFoodType("none")
            ),
            new RandomEvent(
                "Void",
                "FoodChance",
                "There is nothing in this section of space. The stillness gives you chills.",
                $FoodTypeRepository->GetFoodType("none")
            ),
            new RandomEvent(
                "Debris",
                "FoodChance",
                "You encounter a large reckage of space ships, it appears a large space battle took place here before.",
                $FoodTypeRepository->GetFoodType("Metal")
            ),
            new RandomEvent(
                "Asteroid Belt",
                "FoodChance",
                "You notice asteroids flying past you. First with some rarity and becoming more and more frequent.",
                $FoodTypeRepository->GetFoodType("Rock")
            ),
            new RandomEvent(
                "Blue solar system",
                "FoodChance",
                "You move towards a solar system with a hot blue star in the center",
                $FoodTypeRepository->GetFoodType("Blue Giant Solar Energy")
            ),
            new RandomEvent(
                "Space Whalers",
                "DangerousEntity",
                "A band of space whalers approach. They probably launched from that moon over there",
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
