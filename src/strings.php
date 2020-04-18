<?php

class StringHardcodedRepository
{
    

    protected $strings;

    public function __construct()
    {
        $this->strings = array(
            new GameString("IntroText","ScreenText","You awake from cryo sleep to a siren indicating a lifeform has been detected outside. You can't tell how long you were asleep, or what your destination is. The ship board computer is useless, it's only information that it conveys is that there is a lifeform outside that needs your help and you must intervene. What do you do?"),
            new GameString("Planet01","RandomEvent_Planet","You see a massive planet before you. It appears to be completly dead, and filled with large deposits of what looks to be metal."),
            new GameString("Planet02","RandomEvent_Planet","The planet below is covered in lush vegitation, with large bodies of water surrounding ")
        
        );
    }
    public function find($name,...$optArgs){

        $outString = "NULL_STRING";
        $isTypeSet = isset($optArgs["type"]);
        foreach ($this->strings as $s){
            $currentStringObjName = $s->get_name();
            if($currentStringObjName == $name and (!isset($optArgs["type"]) | (isset($optArgs["type"]) and $s->get_type() == $optArgs["type"]) ) ){
                $outString = $s->get_value();
            }
        }
        return($outString);
    }

}