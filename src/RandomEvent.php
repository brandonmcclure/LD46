<?php

class RandomEvent{

    private $eventType;
    private $eventDescription;


    public function __construct ($eventType, $eventDescription){
        $this->eventDescription = $eventDescription;
        $this->eventType = $eventType;
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
}