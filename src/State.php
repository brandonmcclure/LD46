<?php include("header.php"); ?>
<?php include("jumbotronHeader.php"); ?>

<?php
require_once 'GameState.php';
session_start();
echo "what is in the _SESSION?";
echo "<pre>";
    echo print_r($_SESSION);
     echo "</pre>";
     echo "thats it";
$previousStateObj = $_SESSION['gameState'];
$prevStateEnum = $previousStateObj->getCurrentState();
$Action = null;
if(isset($_GET["action"])){
    $Action = $_GET["action"];
}

# These are the results for each action
if($Action == "EasyOut"){
    include("EasyOut.php");
    $_SESSION['gameState']->EnterDeathState();
    exit;
}elseif($Action == "StartGame"){
    $_SESSION['gameState']->EnterRandomEventState();
}elseif($Action == "CharacterNaming_NoName"){
    $_SESSION['gameState']->CharacterNaming_NoName();
}elseif($Action == "CharacterNaming_GiveItAName"){
    if(isset($_GET["action"])){
        $myName = $_GET["CharacterName"];
    }
    $_SESSION['gameState']->CharacterNaming_GiveItAName($myName);
}elseif($Action == "FeedingEvent"){
    $_SESSION['gameState']->LookForFood();
}



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

<!-- This section is generated as a list of actions that can be called. -->
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

<?php include("jumbotronFooter.php"); ?>
<?php include("footer.php"); ?>
