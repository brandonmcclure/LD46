<?php include("header.php"); ?>
<?php include("jumbotronHeader.php"); ?>

<?php
require_once 'GameState.php';
session_start();

$previousStateObj = $_SESSION['gameState'];
$prevStateEnum = $previousStateObj->getCurrentState();
if ($prevStateEnum = 0){
    $_SESSION['gameState']->EnterRandomEventState();
}

if($previousStateObj->getEntityLifeForce() <= 0){
    $_SESSION['gameState']->EnterDeathState();
    exit;
}
if ($prevStateEnum = 1){
    $_SESSION['gameState']->EnterRandomEventState();
}
?>
<?php $buttonTitle = "Advance State"; include("AdvanceStateButton.php"); ?>

<?php include("jumbotronFooter.php"); ?>
<?php include("footer.php"); ?>
