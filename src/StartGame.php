<?php include("header.php"); ?>
<?php include("jumbotronHeader.php"); ?>
<?php 
require_once 'strings.php';
require_once 'string.php';
require_once 'GameState.php';

$newGameState = new GameState();

session_start();

if (isset($_SESSION['gameState'])){
    unset($_SESSION['gameState']);
}

$_SESSION['gameState'] = $newGameState;


$stringRepo = new StringHardcodedRepository;
$outHTML = $stringRepo->find("IntroText");
$outHTML = <<<E
$outHTML
<br><br>
E;

echo $outHTML;
?>
<?php 
    $buttonTitle = "Investigate the lifeform"; 
    $Action = "StartGame";
    include("AdvanceStateButton.php"); 
?>
<?php 
    $buttonTitle = "Disable the ships alarms to allow you to go back to sleep";
    $Action = "EasyOut";
    include("AdvanceStateButton.php"); 
?>

<?php include("jumbotronHeader.php"); ?>

<?php include("footer.php"); ?>
