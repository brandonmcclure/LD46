<?php
require_once 'RandomEvent.php';
require_once 'foodTypes.php';

class RandomEventsHardcodedRepository
{
    protected $RandomEvent = array();

    public function __construct($FoodTypeRepository)
    {
        $this->RandomEvent = array(
            new RandomEvent(
                "Planet",
                "FoodChance",
                "You see a massive planet before you. It appears to be completly dead, and filled with large deposits of what looks to be metal.",
                "You head down to the planet and <<creatureName>> eats the large pieces of metal",
                $FoodTypeRepository->GetFoodType("Metal")
            ),
            new RandomEvent(
                "Planet",
                "FoodChance",
                "The planet below is covered in lush vegitation, with large bodies of water.",
                "The rich planet below supports large heards of space plankton.",
                $FoodTypeRepository->GetFoodType("Space Plankton")
            ),
            new RandomEvent(
                "Void",
                "Void",
                "There is nothing in this section of space. The stillness gives you chills.",
                "Void",
                $FoodTypeRepository->GetFoodType("none")
            ),
            new RandomEvent(
                "Void",
                "Void",
                "nothingness",
                "Void",
                $FoodTypeRepository->GetFoodType("none")
            ),
            new RandomEvent(
                "Debris",
                "FoodChance",
                "You encounter a large reckage of space ships, it appears a large space battle took place here before.",
                "As you fly through the debris, <<creatureName>> eats the large pieces of metal",
                $FoodTypeRepository->GetFoodType("Metal")
            ),
            new RandomEvent(
                "Asteroid Belt",
                "FoodChance",
                "You notice asteroids flying past you. First with some rarity and becoming more and more frequent.",
                "As you fly through the asteroid belt, <<creatureName>> eats the large pieces of rock",
                $FoodTypeRepository->GetFoodType("Rock")
            ),
            new RandomEvent(
                "Asteroid Belt",
                "FoodChance",
                "You move past extremly odd shaped asteroids, some are extremly precise and geometric, sometimes in plain form and sometimes in remarkebly complex ways.",
                "<<creatureName>> eats the large pieces of rock regardless all the same.",
                $FoodTypeRepository->GetFoodType("Rock")
            ),
            new RandomEvent(
                "Blue solar system",
                "FoodChance",
                "You move towards a solar system with a hot blue star in the center",
                "<<creatureName>> absorbs energy from the nearby blue solar system",
                $FoodTypeRepository->GetFoodType("Blue Giant Solar Energy")
            ),
            new RandomEvent(
                "Space Whalers",
                "DangerousEntity",
                "A band of space whalers approach. They probably launched from that moon over there",
                "DangerousEntity",
                $FoodTypeRepository->GetFoodType("none")
            )
        );
    }
    public function GetRandomEvent()
    {

        $typeWeights = array("DangerousEntity" => 20, "FoodChance" => 50, "Void" => 30);
        $randoEventActionType = $this->getRandomWeightedElement($typeWeights);

        $newArray = array();
        foreach ($this->RandomEvent as $e) {
            # Early out if not what we are filtering for
            $a = $e->getEventActionType();
            if ($a != $randoEventActionType) {
                continue;
            }
            $newArray[]=$e;
        }
        $m = sizeof($newArray);
        $i = rand(0, $m - 1);
        return ($newArray[$i]);
    }
    /**
     * getRandomWeightedElement()
     * Utility function for getting random values with weighting.
     * Pass in an associative array, such as array('A'=>5, 'B'=>45, 'C'=>50)
     * An array like this means that "A" has a 5% chance of being selected, "B" 45%, and "C" 50%.
     * The return value is the array key, A, B, or C in this case.  Note that the values assigned
     * do not have to be percentages.  The values are simply relative to each other.  If one value
     * weight was 2, and the other weight of 1, the value with the weight of 2 has about a 66%
     * chance of being selected.  Also note that weights should be integers.
     * 
     * https://stackoverflow.com/questions/445235/generating-random-results-by-weight-in-php
     * @param array $weightedValues
     */
    public function getRandomWeightedElement(array $weightedValues)
    {
        $rand = mt_rand(1, (int) array_sum($weightedValues));

        foreach ($weightedValues as $key => $value) {
            $rand -= $value;
            if ($rand <= 0) {
                return $key;
            }
        }
    }
}
