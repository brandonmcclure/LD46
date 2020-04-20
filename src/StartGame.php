<?php include("header.php"); ?>
<?php include("jumbotronHeader.php"); ?>
<?php 


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

<?php include("jumbotronFooter.php"); ?>
<?php include("footer.php"); ?>
