<?php

class RandomEvent
{

    private $eventType;
    private $eventActionType;
    private $eventDescription;
    private $foodTypeAvailable;


    public function __construct($eventType, $eventActionType, $eventDescription, $foodTypeAvailable)
    {
        $this->eventDescription = $eventDescription;
        $this->eventType = $eventType;
        $this->eventActionType = $eventActionType;
        $this->foodTypeAvailable = $foodTypeAvailable;
    }


    public function getEventDescription()
    {
        return $this->eventDescription;
    }
    public function RenderActions()
    {
        if ($this->eventActionType == "FoodChance") {

            $buttonTitle = "Continue traveling";
            $Action = "MoveOnToNextEvent";
            include("AdvanceStateButton.php");


            $buttonTitle = "Search for food";
            $Action = "FeedingEvent";
            include("AdvanceStateButton.php");
        } elseif ($this->eventActionType == "DangerousEntity") {
        $buttonTitle = "Flee"; 
        $Action = "Flee";
        include("AdvanceStateButton.php"); 

  
        $buttonTitle = "NotFlee"; 
        $Action = "NotFlee";
        include("AdvanceStateButton.php"); 
        }
    }
    public function Render()
    {
        echo <<<e
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
