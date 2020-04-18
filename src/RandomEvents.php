<?php
require 'RandomEvent.php';

class RandomEventsHardcodedRepository
{
    protected $RandomEvent = array();

    public function __construct()
    {
        $this->RandomEvent = array(new RandomEvent("You find a planet"), new RandomEvent("Space debris"));
    }
    public function GetRandomEvent(){
        $m = sizeof($this->RandomEvent);
        $i = rand(0,$m-1);
        return($this->RandomEvent[$i]);
    }
}