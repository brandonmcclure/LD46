<?php

class RandomEvent{

    private $eventType;
    private $eventDescription;
    private $foodTypeAvailable;


    public function __construct ($eventType, $eventDescription, $foodTypeAvailable){
        $this->eventDescription = $eventDescription;
        $this->eventType = $eventType;
        $this->foodTypeAvailable = $foodTypeAvailable;
    }


    public function getEventDescription()
    {
        return $this->eventDescription;
    }

    public function Render(){
        return <<<e
        $this->eventDescription
e;
    }

    /**
     * Get the value of eventType
     */ 
    public function getEventType()
    {
        return $this->eventType;
    }

    /**
     * Get the value of foodTypeAvailable
     */ 
    public function getFoodTypeAvailable()
    {
        return $this->foodTypeAvailable;
    }
}