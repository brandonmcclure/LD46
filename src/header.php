<?php
require_once 'strings.php';
require_once 'string.php';
require_once 'GameState.php';
require_once 'Entity.php';
require_once 'foodType.php';


$StringsRepository = new StringHardcodedRepository();
$FoodTypeRepository = new FoodTypeRepository();
$RandomEventsRepository = new RandomEventsHardcodedRepository($FoodTypeRepository);
$newGameState = new GameState();


if (!isset($_SESSION)) {
  session_start();
}
if (!isset($_SESSION['StringsRepository'])) {
  $_SESSION['StringsRepository'] = $StringsRepository;
}
if (!isset($_SESSION['FoodTypeRepository'])) {
  $_SESSION['FoodTypeRepository'] = $FoodTypeRepository;
}
if (!isset($_SESSION['RandomEventRepository'])) {
  $_SESSION['RandomEventRepository'] = $RandomEventsRepository;
}
if (!isset($_SESSION['gameState'])) {
  $_SESSION['gameState'] = $newGameState;
}


$t = <<<e
<html>
<head>
    <title>Space Whale</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta name="description" content="My entry into Ludam Dare 46 - Theme 'Keep it alive'">
    <meta name=" author" content="Brandon McClure Brandonmcclure89@gmail.com">

    <!-- Custom styles for this template -->
    <link href="css/app.css" rel="stylesheet">
</head>
<body>
<header class="page-header">
    <div class="page-header-inner">
      <h3 class="masthead-brand">Ludam Dare 46 - Theme 'Keep it alive'</h3>
          <ul class="pull-right">
          <li class="pull-right"><a href="/">index</a></li>
            <li class="pull-right"><a href="/ResetSession.php">Restart game</a></li>
            <li class="pull-right"><a href="https://github.com/brandonmcclure/LD46">source code</a></li>
          </ul>
    </div>
  </header>
   
e;

echo $t;
