<?php include("header.php"); ?>
<?php include("jumbotronHeader.php"); ?>
<?php 

$s = $StringsRepository->find("startPageHeader","ImmersionBreak");
echo "<h1>$s</h1>";

echo <<<e
<p>Press the button below to start</p>
<p><a class="btn btn-lg btn-success" href="ResetSession.php" role="button">Start Game</a></p>
e;
$s = $StringsRepository->find("Instructions","ImmersionBreak");
echo "<p>$s</p>";
include("jumbotronFooter.php");
include("footer.php"); ?>