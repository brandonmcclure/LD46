<?php

class StringHardcodedRepository
{


    protected $strings;

    public function __construct()
    {
        $this->strings = array(
            new GameString(
                "IntroText",
                "ScreenText",
                "You awake from cryo sleep to a siren indicating a lifeform has been detected outside. You can't tell how long you were asleep, or what your destination is. The ship board computer is useless, it's only information that it conveys is that there is a lifeform outside that needs your help and you must intervene. What do you do?"
            ),
            new GameString(
                "Planet01",
                "RandomEvent_Planet",
                "You see a massive planet before you. It appears to be completly dead, and filled with large deposits of what looks to be metal."
            ),
            new GameString(
                "Planet02",
                "RandomEvent_Planet",
                "The planet below is covered in lush vegitation, with large bodies of water surrounding "
            ),
            new GameString(
                "Instructions",
                "ImmersionBreak",
                "<br>As you play the game you will need to take action on the \"random\" events that occur. Your goal is to keep your creature feed, and therefore keep it alive. Your creature will have 1 of 4 possible food types That the game will tell you after first rescueing the creture. After the creature starts following you, the random events that occur may have food available, or they may not, so you have to learn the patterns of which events you should feed your creature at and which you should avoid. See how long you can keep your creature alive.<br>There is no win condition, and I make no guarentess that it is well balanced :-)<br><br>"
            ),
            new GameString(
                "startPageHeader",
                "ImmersionBreak",
                "This is my entry to Ludam Dare 46. I call it 'Space Whales'"
            )

            

        );
    }
    public function find($name, ...$optArgs)
    {

        $outString = "NULL_STRING";
        $isTypeSet = isset($optArgs["type"]);
        foreach ($this->strings as $s) {
            $currentStringObjName = $s->get_name();
            if ($currentStringObjName == $name and (!isset($optArgs["type"]) | (isset($optArgs["type"]) and $s->get_type() == $optArgs["type"]))) {
                $outString = $s->get_value();
            }
        }
        return ($outString);
    }
}
