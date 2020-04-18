<?php

class RandomEvent{

    private $eventDescription;


    public function __construct ($_eventDescription){
        $this->eventDescription = $_eventDescription;
    }


    public function getEventDescription()
    {
        return $this->eventDescription;
    }
}