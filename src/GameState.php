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
}