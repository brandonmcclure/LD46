<?php include("header.php"); ?>
<?php include("jumbotronHeader.php"); ?>

<?php
require_once 'GameState.php';
if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 

$previousStateObj = $_SESSION['gameState'];
$prevStateEnum = $previousStateObj->getCurrentState();
$Action = null;
if(isset($_GET["action"])){
    $Action = $_GET["action"];
}


# These are the results for each action
if($Action == "EasyOut"){
    $s = $StringsRepository->find("IgnoreItDeathState");
    echo $s;
    $_SESSION['gameState']->EnterDeathState();
    exit;
}elseif($Action == "StartGame"){
    $_SESSION['gameState']->InitEntity();
    $buttonTitle = "Begin traveling"; 
    $Action = "";
    include("AdvanceStateButton.php");
    
}elseif($Action == "CharacterNaming_NoName"){
    $_SESSION['gameState']->CharacterNaming_NoName();
}elseif($Action == "CharacterNaming_GiveItAName"){
    if(isset($_GET["action"])){
        $myName = $_GET["CharacterName"];
    }
    $_SESSION['gameState']->CharacterNaming_GiveItAName($myName);
}elseif($Action == "FeedingEvent"){
    $_SESSION['gameState']->LookForFood();
}elseif($Action == "NotFlee"){
    $_SESSION['gameState']->NotFleeEvent();
}elseif($Action == "Flee"){
    $_SESSION['gameState']->FleeEvent();
}elseif($Action == "MoveOnToNextEvent"){
    $previousStateObj->setTextFromPreviousState("");
}

echo $previousStateObj->getTextFromPreviousState();

# high level control of the gamestate. Start, loop, exit
if($previousStateObj->getEntityLifeForce() <= 0){
    $_SESSION['gameState']->EnterDeathState();
    exit;
}
if ($prevStateEnum == 1){
    # Name the creature after the 5th turn
    if(!$_SESSION['gameState']->getGameEntityIsNamed() && $_SESSION['gameState']->getNumberOfTurnsTaken() > 5 ){
        $_SESSION['gameState']->NameCreatureEvent();
        exit;
    }
    else{
        $_SESSION['gameState']->EnterRandomEventState();
    }
}

?>

<!-- This section is generated as a list of actions that can be called. 
<?php 
    $buttonTitle = "Continue traveling"; 
    $Action = "MoveOnToNextEvent";
    include("AdvanceStateButton.php"); 
?>

<?php 
    $buttonTitle = "Search for food"; 
    $Action = "FeedingEvent";
    include("AdvanceStateButton.php"); 
?>
-->
<?php include("jumbotronFooter.php"); ?>
<?php include("footer.php"); ?>
