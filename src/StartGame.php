<?php include("header.php"); ?>
<?php include("jumbotronHeader.php"); ?>
<?php 
require_once 'strings.php';
require_once 'string.php';
require_once 'GameState.php';
require_once 'Entity.php';
require_once 'foodType.php';

// Make stuff to take care of the incomplete classes in _SESSION
// This makes me feel dirty, like I am going about this the wrong way...
//$garbageFoodType = new foodType("a");
//$garbage = new Entity($garbageFoodType);

$FoodTypeRepository = new FoodTypeRepository();
$newGameState = new GameState();


if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 

if (isset($_SESSION['FoodTypeRepository'])){
    unset($_SESSION['FoodTypeRepository']);
}
$_SESSION['FoodTypeRepository'] = $FoodTypeRepository;


if (isset($_SESSION['gameState'])){
    unset($_SESSION['gameState']);
}
$_SESSION['gameState'] = $newGameState;

$_SESSION['gameState']->InitRandomEventRepo();
$_SESSION['gameState']->InitEntity();

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
