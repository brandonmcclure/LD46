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
}


if($previousStateObj->getEntityLifeForce() <= 0){
    $_SESSION['gameState']->EnterDeathState();
    exit;
}
if ($prevStateEnum == 1){
    $_SESSION['gameState']->EnterRandomEventState();
}


?>
<?php 
    $buttonTitle = "Continue traveling"; 
    $Action = "MoveOnToNextEvent";
    include("AdvanceStateButton.php"); 
?>

<?php include("jumbotronFooter.php"); ?>
<?php include("footer.php"); ?>
