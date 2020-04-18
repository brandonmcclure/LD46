<?php
require 'Models/RandomEvent.php';
interface RandomEventsRepositoryInterface
{
    public function GetRandomEvent();
}

class RandomEventsHardcodedRepository implements RandomEventsRepositoryInterface
{
    protected $RandomEvent = array();

    public function __construct()
    {
        $this->RandomEvent = array(new RandomEvent("You find a planet"), new RandomEvent("Space debris"));
    }
    public function GetRandomEvent(){
        $m = sizeof($this->RandomEvent);
        $i = rand(0,$m);
        return($this->RandomEvent[$i]);
    }
}