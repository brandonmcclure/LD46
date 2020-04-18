<?php 
require 'repositories/strings.php';
require 'Models/string.php';
require 'Models/GameState.php';

echo("The game starts");
$gameState = new GameState();

$stringRepo = new StringHardcodedRepository;
echo "{$stringRepo->find("IntroText")}";

?>

<!-- https://stackoverflow.com/questions/871858/php-pass-variable-to-next-page -->
<form action="Controllers/state.php" method="post">
<input type="hidden" name="previousState" value=$gameState>
<input type="submit" value="advance state">
</form>