<?php
require_once 'RandomEvents.php';
require_once 'Entities.php';

abstract class ValidGameStates
{
    const Begining = 0;
    const RandomEventLoop = 1;
}

class GameState{

    private $currentState;
    private $RandomEventsRepository;
    private $EntityLifeForce = 10;
    private $NumberOfTurnsTaken = 0;
    private $isDebugMode = False;
    private $gameEntity;

    public function __construct (...$gameState){
        if($gameState){
            $x = 0;
            $y = $x;
            $this->currentState = $gameState;
        }
        else{
            $this->currentState = 0;
            $this->RandomEventsRepository = new RandomEventsHardcodedRepository();
            $entityRepo = new EntityRepository();
            $this->gameEntity = $entityRepo->GetRandomEntity();
        }
    }

    public function getCurrentState()
    {
        return $this->currentState;
    }

    public Function EnterRandomEventState(){
        $this->NumberOfTurnsTaken = $this->NumberOfTurnsTaken+1;
        $this->EntityLifeForce = $this->EntityLifeForce -1;
        $this->currentState = 1;
        $randoEvent = $this->RandomEventsRepository->GetRandomEvent();
        echo($randoEvent->Render());
        $x = 0;
        $y = $x;
    }

    public function EnterDeathState(){
        $this->currentState = 99;
        echo("You loose, you lasted {$this->NumberOfTurnsTaken} turns. Try again?");
        echo("<br><br><a href=ResetSession.php>Yes</a>");
    }


    /**
     * Get the value of EntityLifeForce
     */ 
    public function getEntityLifeForce()
    {
        return $this->EntityLifeForce;
    }

    /**
     * Get the value of isDebugMode
     */ 
    public function getIsDebugMode()
    {
        return $this->isDebugMode;
    }

    public function TurnOnDebugMode()
    {
        $this->isDebugMode = true;

        return $this;
    }

    public function TurnOffDebugMode()
    {
        $this->isDebugMode = false;

        return $this;
    }

    /**
     * Get the value of NumberOfTurnsTaken
     */ 
    public function getNumberOfTurnsTaken()
    {
        return $this->NumberOfTurnsTaken;
    }

    /**
     * Get the name of the creature
     */ 
    public function getGameEntityName()
    {
        return $this->gameEntity->get_name();
    }

    /**
     * Get the name of the creature
     */ 
    public function getGameEntityIsNamed()
    {
        return $this->gameEntity->get_HasBeenNamed();
    }

    public function NameCreatureEvent(){
        $s = <<<e
        You have been traveling with the creature for some time now, perhaps you should give it a name.
e;
        echo($s);

        $buttonTitle = "Don't give IT a name and continue traveling"; 
        $Action = "CharacterNaming_NoName";
        include("AdvanceStateButton.php"); 

        $buttonTitle = "Lets give it a name"; 
        $Action = "CharacterNaming_GiveItAName";
        include("AdvanceStateButton.php"); 
    }

    public function CharacterNaming_GiveItAName($newName){
            $this->gameEntity->set_name($newName);
    }

    public function CharacterNaming_NoName(){
        $this->gameEntity->set_name();
    }
}