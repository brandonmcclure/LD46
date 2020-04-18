<?php include("header.php"); ?>
<?php include("jumbotronHeader.php"); ?>
<?php 
require_once 'strings.php';
require_once 'string.php';
require_once 'GameState.php';

echo("The game starts");
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
<?php include("AdvanceStateButton.php"); ?>
<?php include("jumbotronHeader.php"); ?>

<?php include("footer.php"); ?>
