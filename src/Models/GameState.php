<?php
require 'repositories/RandomEvents.php';

abstract class ValidGameStates
{
    const Begining = 0;
    const RandomEventLoop = 1;
}

class GameState{

    private $currentState;
    private $RandomEventsRepository;

    public function __construct (...$gameState){
        if($gameState){
            $x = 0;
            $y = $x;
            $this->currentState = $gameState;
        }
        else{
            $this->currentState = 0;
            $this->RandomEventsRepository = new RandomEventsHardcodedRepository();
        }
    }

    public function getCurrentState()
    {
        return $this->currentState;
    }

    public Function EnterRandomEventState(){
        $this->currentState = 1;
        $randoEvent = $this->RandomEventsRepository->GetRandomEvent();
    }
}