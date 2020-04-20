<?php include("header.php"); ?>
<?php include("jumbotronHeader.php"); ?>
<?php 
if (!isset($_SESSION['StringsRepository'])) {
    echo "Could not load strings";
}
$stringRepo = $_SESSION['StringsRepository'];
$s = $stringRepo->find("startPageHeader","ImmersionBreak");
echo "<h1>$s</h1>";

echo <<<e
<p>Press the button below to start</p>
<p><a class="btn btn-lg btn-success" href="ResetSession.php" role="button">Start Game</a></p>
e;
$s = $stringRepo->find("Instructions","ImmersionBreak");
echo "<p>$s</p>";

include("footer.php"); ?>