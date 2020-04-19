<?php
require_once 'RandomEvents.php';
require_once 'Entities.php';

// This is really just here for me to keep track of what the game state IDs are. I want a dictionary<int><string> to hold this but did not bother figuring out how to do that.
abstract class ValidGameStates
{
    const Begining = 0;
    const RandomEventLoop = 1;
    const CreatureRenaming = 2;
    const CreatureFeeding = 3;
    const Death = 99;
}

class GameState{

    private $currentState;
    private $RandomEventsRepository;
    private $NumberOfTurnsTaken = 0;
    private $isDebugMode = true;
    private $gameEntity;
    private $currentEvent;

    public function __construct (...$gameState){
        if($gameState){
            $this->currentState = $gameState;
        }
        else{
            $this->currentState = 0;
            
        }
    }

    public function InitRandomEventRepo(){
        $this->RandomEventsRepository = new RandomEventsHardcodedRepository();
    }
    public function InitEntity(){
        $entityRepo = new EntityRepository();
        $this->gameEntity = $entityRepo->GetRandomEntity();
    }

    public function getCurrentState()
    {
        return $this->currentState;
    }

    public Function EnterRandomEventState(){
        $this->NumberOfTurnsTaken = $this->NumberOfTurnsTaken+1;
        $this->gameEntity->Decrement_Hunger();
        $this->gameEntity->Decrement_LifeForce();
        $this->currentState = 1;
        $this->currentEvent = $this->RandomEventsRepository->GetRandomEvent();
        echo $this->currentEvent->Render();
        
        echo $this->gameEntity->RenderEntityStatus();
    }

    public function EnterDeathState(){
        $this->currentState = 99;
        echo "You loose, you lasted {$this->NumberOfTurnsTaken} turns. Try again?";
        echo "<br><br><a href=ResetSession.php>Yes</a>";
    }


    /**
     * Get the value of EntityLifeForce
     */ 
    public function getEntityLifeForce()
    {
        return $this->gameEntity->get_LifeForce();
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
        return $this->gameEntity->get_EntityName();
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
        echo $s;

        $buttonTitle = "Don't give IT a name and continue traveling"; 
        $Action = "CharacterNaming_NoName";
        include("AdvanceStateButton.php"); 
$s = <<<e
<br><br>
<form action="State.php" method="get">
Creature Name: <input type="text" name="CharacterName"><br>
<input type="hidden" name="action" value="CharacterNaming_GiveItAName">
<input type="submit" value="Rename the creature">
</form>
e;
        echo $s;
    }

    public function CharacterNaming_GiveItAName($newName){
            $this->gameEntity->set_EntityName($newName);
    }

    public function CharacterNaming_NoName(){
        $this->gameEntity->set_EntityName();
    }

    public function LookForFood(){
        $chanceOfFindingFood = .5;

        $eventFoodType = $this->currentEvent->getFoodTypeAvailable();
        $entityFoodType = $this->gameEntity->get_foodType();

        if($eventFoodType == $entityFoodType){
            $rando = mt_rand() / mt_getrandmax();
            if($rando <$chanceOfFindingFood){
                $this->gameEntity->Feed();
            }
        }
        else{
            $this->gameEntity->Decrement_LifeForce();
        }
    }
}