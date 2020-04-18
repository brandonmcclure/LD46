<?php
require 'RandomEvent.php';

class RandomEventsHardcodedRepository
{
    protected $RandomEvent = array();

    public function __construct()
    {
        $this->RandomEvent = array(
            new RandomEvent("Planet","You see a massive planet before you. It appears to be completly dead, and filled with large deposits of what looks to be metal."),
            new RandomEvent("Planet","The planet below is covered in lush vegitation, with large bodies of water."),
            new RandomEvent("Void","There is nothing in this section of space. The stillness gives you chills."),
            new RandomEvent("Debris","You encounter a large reckage of space ships, it appears a large space battle took place here before.")
            );
    }
    public function GetRandomEvent(){
        $m = sizeof($this->RandomEvent);
        $i = rand(0,$m-1);
        return($this->RandomEvent[$i]);
    }
}