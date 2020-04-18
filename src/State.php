<?php include("header.php"); ?>
<?php include("jumbotronHeader.php"); ?>

<?php
require_once 'GameState.php';
session_start();

$previousStateObj = $_SESSION['gameState'];
$prevStateEnum = $previousStateObj->getCurrentState();
$Action = null;
if(isset($_GET["action"])){
    $Action = $_GET["action"];
}

//You choose to ignore the creature from the start
if($Action == "EasyOut"){
    include("EasyOut.php");
    $_SESSION['gameState']->EnterDeathState();
    exit;
}elseif($Action == "StartGame"){
    $_SESSION['gameState']->EnterRandomEventState();
}elseif($Action == "CharacterNaming_NoName"){
    $_SESSION['gameState']->CharacterNaming_NoName();
}elseif($Action == "CharacterNaming_GiveItAName"){
    $s = <<<e
    

e;
    echo($s);
    $_SESSION['gameState']->CharacterNaming_GiveItAName("myName");
}


if($previousStateObj->getEntityLifeForce() <= 0){
    $_SESSION['gameState']->EnterDeathState();
    exit;
}
if ($prevStateEnum == 1){
    if(!$_SESSION['gameState']->getGameEntityIsNamed() and $_SESSION['gameState']->getNumberOfTurnsTaken() > 0 ){
        $_SESSION['gameState']->NameCreatureEvent();
        exit;
    }
    else{
        $_SESSION['gameState']->EnterRandomEventState();
    }
}


?>
<?php 
    $buttonTitle = "Continue traveling"; 
    $Action = "MoveOnToNextEvent";
    include("AdvanceStateButton.php"); 
?>

<?php include("jumbotronFooter.php"); ?>
<?php include("footer.php"); ?>
